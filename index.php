<?php
 ini_set("soap.wsdl_cache_enabled", 0);
 
 require_once('classes/soap_class.php');
 

	
 $sc = new soap_client();
 
 
 $inventory = $sc->getInventory_quy();
 echo "<pre>";print_r($inventory);
 /*
 foreach($currencies as $c){
   echo $c->CurrencyName;
 }
 */
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
  