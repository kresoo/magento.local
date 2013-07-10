<?php

class Inchoo_Exchange_Model_Cron
{
    public function refreshExchangeRates()
    {
        try{
            $allRates = Mage::helper('inchoo_exchange')->getExchangeRates();
            $read = Mage::getSingleton('core/resource')->getConnection('core_read');    
            $read->query("TRUNCATE TABLE inchoo_exchange_rate");

            foreach($allRates as $rate){
                Mage::getModel('inchoo_exchange/exchangerate')->addData($rate)->save();
            }
            Mage::log("Cron executed");
        } catch (Exception $e){
            Mage::log($e->getMessage());
        }
    }
}
