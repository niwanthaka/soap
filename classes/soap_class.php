<?php

Class soap_client{

 var $wsdl_content;
 var $wsdl_inventory;
 var $client;
 
  function __construct(){     
	     $trace = true;
	     $exceptions = true;
	     $this->wsdl_content ='http://hbe-api.whl-staging.com/services/content/soap?wsdl';
             $this->wsdl_inventory ='http://hbe-api.whl-staging.com/services/inventory/soap?wsdl';
	     $this->client_content = new SoapClient($this->wsdl_content, array('trace' => $trace, 'exceptions' => $exceptions));
	     $this->client_inventory = new SoapClient($this->wsdl_inventory, array('trace' => $trace, 'exceptions' => $exceptions));
	      //$headers = array();
	      //$headers[] = new SoapHeader('http://schemas.xmlsoap.org/soap/envelope/','xmlns');
	      //$headers = new SoapHeader('http://hbe-api.whl-staging.com/services/inventory/soap','xmlns');
              //var_dump($headers);
	      //$headers[] = new SoapHeader('http://schemas.xmlsoap.org/soap/encoding/','xmlns');
              //$this->client_inventory->__setSoapHeaders($headers);
  }
  
    
   function getCurrencies(){
                
              $request_currencies = array('Request' => array(
		                                 'Credential' => array(
		                                                'ChannelManagerUsername' => 'test',
		                                                'ChannelManagerPassword' => 'test',
		                                                'ChannelManagerAuthenticationKey' => ''        
		                                 	),
		                                 'Language' => 'en'

	       				));
              $response_currencies = $this->client_content->GetCurrencies($request_currencies);
              return $response_currencies->GetCurrenciesResult->Currencies;
   }
   
  /*function GetHotelRooms(){
                
              $request_hotelrooms = array('Request' => array(

                                 'Credential' => array(
                                                'ChannelManagerUsername' => 'test',
                                                'ChannelManagerPassword' => 'test',
                                                'ChannelManagerAuthenticationKey' => '',  
                                                'Hotelid' => '5994c2db-cd76-401c-ba2e-e178ae118a8d',
                                                'HotelUsername' => '',
                                                'HotelPassword' => '',
                                                'HotelAuthenticationKey' => '',
                                                'HotelAuthenticationChannelKey' => '50a9ce8e51ec31e370f4c2bff74f143c'                  
                                 	),
                                 'Language' => 'en'

	       ));
	      try
              { 
              $response_hotelrooms = $this->client_content->GetHotelRooms($request_hotelrooms);
              return $response_currencies->GetHotelRoomsResult->Rooms;
              }
              catch (Exception $e)
              {
              echo "Error!<br>";
              echo $e -> getMessage ();
              echo '<br>Last response: '. $client->__getLastResponse();
              }
   }*/
   
   function getInventory(){
   
              $request_inventory = array('Request' => array(
                                  
                                 'RatePlans'  => array('item' => '7720a565-65ef-49ed-93fa-a2468ff61149'),
                                 'DateRange'  => array('From' => '2014-12-30','To' => '2014-12-31'),
                                 'Credential' => array(
                                                'ChannelManagerUsername' => 'test',
                                                'ChannelManagerPassword' => 'test',
                                                'ChannelManagerAuthenticationKey' => '',
                                                'HotelId' => '5994c2db-cd76-401c-ba2e-e178ae118a8d',
                                                'HotelUsername' => '',
                                                'HotelPassword' => '',
                                                'HotelAuthenticationKey' => 'a60dd73f2fd40ecd7cf0340188e6c772',
                                                'HotelAuthenticationChannelKey' => ''        
                                 	),
                                 'Language'   => 'en'

	       ));
	      
	      try
	      { 
	      $response_inventory = $this->client_inventory->GetInventory($request_inventory);
              return $response_inventory->GetInventoryResult->Inventories;
              }
              catch(SoapFault $E)
              {
                echo $E->faultstring; 
              }
   }
   
   function getInventory_quy(){
   
	
$request_inventory = new stdClass();
$request_inventory->Request = new stdClass();
$request_inventory->Request->Credential = new stdClass();
$request_inventory->Request->Credential->ChannelManagerUsername = 'test';
$request_inventory->Request->Credential->ChannelManagerPassword = 'test';
$request_inventory->Request->Credential->HotelId =  '5994c2db-cd76-401c-ba2e-e178ae118a8d';
$request_inventory->Request->Credential->HotelAuthenticationKey =  'a60dd73f2fd40ecd7cf0340188e6c772';
$request_inventory->Request->Language='en';
$request_inventory->Request->RatePlans=array();
$request_inventory->Request->RatePlans['item'] = '7720a565-65ef-49ed-93fa-a2468ff61149';
$request_inventory->Request->DateRange = new stdClass();
$request_inventory->Request->DateRange->To = '2014-12-31';
$request_inventory->Request->DateRange->From = '2014-12-30';
	
	        
/*	
$request_inventory = new stdClass();
$request_inventory->Credential = new stdClass();
$request_inventory->Credential->ChannelManagerUsername = 'test';
$request_inventory->Credential->ChannelManagerPassword = 'test';
$request_inventory->Credential->HotelId =  '5994c2db-cd76-401c-ba2e-e178ae118a8d';
$request_inventory->Credential->HotelAuthenticationKey =  'a60dd73f2fd40ecd7cf0340188e6c772';
$request_inventory->Language = 'en';
$request_inventory->RatePlans = array();
$request_inventory->RatePlans['item'] = '7720a565-65ef-49ed-93fa-a2468ff61149';
$request_inventory->DateRange = new stdClass();
$request_inventory->DateRange->To = '2014-12-31';
$request_inventory->DateRange->From = '2014-12-30';			 
	*/
		echo "<pre>";print_r($request_inventory);
	      
	      try
	      { 
	      $response_inventory = $this->client_inventory->GetInventory($request_inventory);
	      echo "<pre>";print_r($response_inventory);
              return $response_inventory->GetInventoryResult->Inventories;
              }
              catch(SoapFault $E)
              {
                echo $E->faultstring; 
              }
   }

}