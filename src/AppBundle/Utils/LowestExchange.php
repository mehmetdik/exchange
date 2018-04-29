<?php

namespace AppBundle\Utils;
class LowestExchange
{

    /**
     * Getting lowest usd from set of class that implements exchange interface
     * @return mixed
     */
    public function getLowest($exchanges)
    {

        for($i=0;$i<count($exchanges);$i++){
            $val =  $exchanges[$i];
            $j = $i-1;
            while($j>=0 && $exchanges[$j][0]->getPrice() > $val[0]->getPrice()){
                $exchanges[$j+1] = $exchanges[$j];
                $j--;
            }
            $exchanges[$j+1] = $val;
        }

        return $exchanges[0];
    }
}