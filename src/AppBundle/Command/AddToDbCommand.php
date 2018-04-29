<?php

namespace AppBundle\Command;

use AppBundle\Entity\Currency;
use AppBundle\Entity\Exchange;
use AppBundle\Entity\Provider;
use AppBundle\Entity\Symbol;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Config\Definition\Exception\Exception;


class AddToDbCommand extends Command
{
    public function  __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setName('app:add-to-db')
            ->setDescription('Add API to db')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $prd_definitions = json_decode(file_get_contents(__DIR__.'/../'.'\Data\provider.json'), true);

        foreach ($prd_definitions as $prd_definition){
            $provider = new Provider();
            $provider->setUrl($prd_definition['url']);
            $provider->setName($prd_definition['name']);
            $provider->setWrapper($prd_definition['wrapper']);

            $this->em->persist($provider);

            foreach ($prd_definition['symbols'] as $symbol){

                $crrc = $this->em->getRepository('AppBundle:Currency')->findOneBy(array('code' => $symbol['type']));

                $sym = new Symbol();
                $sym->setCode($symbol['code']);
                $sym->setProvider($provider);
                $sym->setCurrency($crrc);

                $this->em->persist($sym);

            }
        }
        $this->em->flush();

        $output->writeln('The provider was created.');
    }

}
