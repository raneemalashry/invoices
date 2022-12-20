<?php

namespace Zakah\Invoices;

use Illuminate\Http\Response;

class Invoice extends ValidationInvoice {
    private $data;


    public function create($data)

    {
        $this->data=$data;
         $this->ValidateInvoiceFields($this->data);
         if(count($this->errors))
         return response()->json(['errors',$this->errors]);
         else{
                return response()->json(['message'=>'Invoice created successfully']);
         }


    }



}
