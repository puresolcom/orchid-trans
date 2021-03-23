<?php

namespace App\Observers;
use App\Models\Invoice;

class InvoiceObserver
{
    public function deleting(Invoice $invoice)
    {
        $invoice->attachment()->delete();
    }
}
