<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;

class InvoiceMeta extends Model
{
    use HasFactory,AsSource;

    protected $fillable = ['invoice_id',"key","value"];
}
