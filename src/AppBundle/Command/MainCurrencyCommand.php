<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Entity\Currency;
use Doctrine\ORM\EntityManagerInterface;



class MainCurrencyCommand extends Command
{
    public function  __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setName('app:main-currency')
            ->setDescription('You can define main Currency.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $codes = json_decode(file_get_contents(__DIR__.'/../'.'\Data\currency.json'), true);

        foreach ($codes as $code){
            $currency = new Currency();
            $currency->setCode($code['code']);

            $this->em->persist($currency);
        }

        $this->em->flush();

        $output->writeln('The main currency was created.');

    }

}
