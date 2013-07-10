<?php

class Inchoo_Exchange_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getExchangeRates()
    {
        $client = new Zend_Http_Client('http://hnb.hr/tecajn/hvazeca.htm');
        $client->setHeaders('Content-type: text/html; charset=utf-8');
        $request = $client->request('GET');
        $rows = explode("\n", $request);

        $i = 0;
        $allRates = array();
        foreach ($rows as $row) {
            if ($i > 32 && $i < 46) {
                $rate = array();
                $rate['drzava'] = iconv('windows-1250', 'UTF-8',trim(substr($row, 0, 16))); // drzava
                $rate['sifra'] = trim(substr($row, 16, 3)); // sifra
                $rate['valuta'] = trim(substr($row, 19, 4)); // valuta
                $rate['jedinica'] = trim(substr($row, 23, 5)); // jedinica
                $rate['kupovni'] = trim(substr($row, 28, 16)); //kupovni
                $rate['srednji'] = trim(substr($row, 44, 16)); //srednji 
                $rate['prodajni'] = trim(substr($row, 60, 16)); //prodajni
                
                $allRates[] = $rate;
            }
            $i++;
        }
        return $allRates;
    }
}