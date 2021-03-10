<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Invoice\InvoiceService;

class InvoiceController extends Controller
{
    protected $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    public function getInvoiceEditModal(Request $request){
        $id = $request->input('id');
        $invoice = $this->invoiceService->getInvoiceById($id);
        return view('invoice.ajax.add-more-charge',compact('invoice'));
    }

    public function addMoreChargeLine(){
        return view();
    }
}
