<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Invoice\InvoiceService;
use App\Models\AdditionalCharge;

class InvoiceController extends Controller
{
    protected $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    // public function getInvoiceEditModal(Request $request){
    //     $id = $request->input('id');
    //     $invoice = $this->invoiceService->getInvoiceById($id);
    //     return view('invoice.ajax.add-more-charge',compact('invoice'));
    // }

    public function addMoreChargeLine(Request $request){

        $count = $request->input('count');
        if(empty($count)){
            $count = 1;
        }else{
        $count = $count + 1; 
        }
        $additionalCharges = AdditionalCharge::all();
        return view('invoice.ajax.add-more-charge',compact('count','additionalCharges'));
    }
}
