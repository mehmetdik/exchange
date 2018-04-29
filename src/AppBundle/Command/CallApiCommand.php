<?php

namespace AppBundle\Command;

use AppBundle\Entity\Exchange;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use Unirest;


class CallApiCommand extends Command
{
    public function  __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setName('app:call-api')
            ->setDescription('Recieved data saved in database.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $providers = $this->em->getRepository('AppBundle:Provider')->findAll();

        foreach ($providers as $provider){
            if($provider->getUrl()){
                $headers = array('Accept' => 'application/json');
                $response = Unirest\Request::post($provider->getUrl(), $headers);

                if($provider->getWrapper()){
                    $temp = $provider->getWrapper();
                    foreach ($response->body->$temp as $temp){
                        $symbol = $this->em->getRepository('AppBundle:Symbol')->findOneBy(array('provider' => $provider,'code' => $temp->symbol));

                        $exchange = new Exchange();
                        $exchange->setPrice($temp->amount);
                        $exchange->setCode($temp->symbol);
                        $exchange->setSymbol($symbol);

                        $this->em->persist($exchange);
                    }


                }else{
                    foreach ($response->body as $temp){
                        $symbol = $this->em->getRepository('AppBundle:Symbol')->findOneBy(array('provider' => $provider,'code' => $temp->kod));

                        $exchange = new Exchange();
                        $exchange->setPrice($temp->oran);
                        $exchange->setCode($temp->kod);
                        $exchange->setSymbol($symbol);

                        $this->em->persist($exchange);
                    }
                }
            }
        }

        $this->em->flush();
        $output->writeln('Recieved data saved in database.');
    }

}
