<?php

namespace Zakah\Invoices;

use Illuminate\Http\Response;

class ValidationInvoice {
    // private static $Buyer_Address=['StreetName','BuildingNumber','CityName','PostalZone','CountrySubentity','Country'];
    private static $Supplier_Address=['StreetName','BuildingNumber','CityName','PostalZone','CountrySubentity','Country'];
    private static $classifiedTaxCategory=['StreetName','BuildingNumber','CityName','PostalZone','CountrySubentity','Country'];
    private static $invoice=['discount'];
    private static $products=['Name','BuildingNumber','CityName','PostalZone','CountrySubentity','Country'];
    private static $fields=['TaxScheme','country','id','type_code','paymentMeans_Code']; // this is the static fields that will be sent to the api
    protected $errors;


    public function ValidateInvoiceFields($data)
    {
        //check if the Attributes are set
       foreach(self::$fields as $field)
       {
           if(!isset($data[$field]))
           {
              $this->addError($field, "The field $field is required") ;
           }
       }
    //    foreach(self::$Buyer_Address as $field)
    //    {
    //        if(!isset($data['Buyer_Address'][$field]))
    //        {
    //           $this->addError($field, "The field $field is required") ;
    //        }
    //    }
       foreach(self::$products as $field)
       {

        foreach($data['Products'] as $key =>$product)
        {

           if(!isset($product[$field]))
           {
              $this->addError($field. $key, "The field $field for $key is required") ;
           }
        }
       }

    }
    public function addError ($key,$error)
    {
          return $this->errors[$key]=$error;

    }

}
