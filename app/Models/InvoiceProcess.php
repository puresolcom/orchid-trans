<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceProcess extends Model
{
    use HasFactory;

    protected $table = 'invoice_processes';
    protected $guarded = [];

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }
}
