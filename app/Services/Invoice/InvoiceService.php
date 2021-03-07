<?php
namespace App\Services\Invoice;

use App\Services\BaseService;
use App\Models\Invoice;

class InvoiceService extends BaseService
{
    
    public function getInvoiceById($id){
        $invoice = Invoice::where('id',$id)->first();
        return $invoice;
    }
}
