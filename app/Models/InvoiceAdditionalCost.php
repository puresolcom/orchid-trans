<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class InvoiceAdditionalCost extends Model
{
    use HasFactory,Attachable,AsSource;

    protected $table = 'invoice_additional_costs';

    protected $fillable = ['invoice_id','description','cost','vat'];
}
