<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use App\Models\InvoiceAdditionalCost;
use App\Models\InvoiceProcess;
use App\Models\InvoiceMeta;
use Orchid\Attachment\Models\Attachment;

class Invoice extends Model
{
    use HasFactory,AsSource,Attachable;

    protected $fillable = ['user_id','bid_id','number','reference_number', 'should_apply_vat', 'credit_days', 'customer_reference', 'draft', 'approved_at'];

    protected $dates = ['approved_at'];

    protected $casts = [
        'aditional_charges' => 'array',
        'should_apply_vat' => 'boolean',
    ];

    public function invoiceMetas(){
        return $this->hasMany(InvoiceMeta::class, 'invoice_id');
    }

    public function invoiceProcesses(){
        return $this->hasMany(InvoiceProcess::class, 'invoice_id');
    }

    public function details()
    {
        return $this->hasMany(InvoiceAdditionalCost::class, 'invoice_id');
    }

    // public function attachments()
    // {
    //     return $this->hasMany(Attachment::class,'id')->withDefault();
    // }
}
