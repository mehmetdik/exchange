<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Utils\LowestExchange;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $currencies = $em->getRepository('AppBundle:Currency')->findAll();
        $temp=array();
        $lowest=array();
        $lowestUsd=array();

        foreach ($currencies as $currency){

            $symbols = $em->getRepository('AppBundle:Symbol')->findBy(array('currency' => $currency));
            foreach ($symbols as $symbol){
                $exchange = $em->getRepository('AppBundle:Exchange')->findBy(array('symbol' => $symbol));
                array_push($temp,$exchange);
            }

            $lowestExchange = new LowestExchange();
            $lowestPr = $lowestExchange->getLowest($temp);

            $temp=array();

            array_push($lowest,$lowestPr);

        }

        return $this->render('default/index.html.twig', array('lowest' => $lowest));

    }
}
