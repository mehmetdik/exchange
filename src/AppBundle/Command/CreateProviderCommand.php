<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\Provider;
use AppBundle\Entity\Exchange;
use AppBundle\Entity\Symbol;


class CreateProviderCommand extends Command
{
    public function  __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }
    protected function configure()
    {
        $this
            ->setName('app:create-provider')
            ->setDescription('you can define provider')
        ;
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $provider = new Provider();
        $provider->setUrl('');
        $provider->setName('provider3');

        $this->em->persist($provider);

        $datas = array(['code'=>'USD','price'=>4],['code'=>'EUR','price'=>3.7],['code'=>'GBP','price'=>2.7]);

        foreach ($datas as $data){

            $currency = $this->em->getRepository('AppBundle:Currency')->findOneBy(array('code' => $data['code']));

            $symbol = new Symbol();
            $symbol->setCode($data['code']);
            $symbol->setCurrency($currency);
            $symbol->setProvider($provider);

            $this->em->persist($symbol);

            $exchange = new Exchange();
            $exchange->setCode($data['code']);
            $exchange->setPrice($data['price']);
            $exchange->setSymbol($symbol);

            $this->em->persist($exchange);

        }

        $this->em->flush();

        $output->writeln('The provider was created.');
    }



}
