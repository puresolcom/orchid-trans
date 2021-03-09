<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Invoice extends Model
{
    use HasFactory,AsSource,Attachable;

    protected $fillable = ['user_id','bid_id','number','reference_number', 'should_apply_vat', 'credit_days', 'customer_reference', 'draft', 'approved_at'];

    protected $dates = ['approved_at'];

    protected $casts = [
        'aditional_charges' => 'array',
        'should_apply_vat' => 'boolean',
    ];
}
