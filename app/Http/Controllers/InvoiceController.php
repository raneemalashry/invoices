<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Zakah\Invoices\Invoice;

class InvoiceController extends Controller
{
    public function createInvoice(Request $request ,Invoice $invoice) {
        
        return $invoice->create($request->all());
    }
}
