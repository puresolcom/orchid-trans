<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_processes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('invoice_id');
            $table->integer('owner_id');
            $table->tinyInteger('owner_role_id');
            $table->boolean('approved')->nullable()->default(null);
            $table->text('reason')->nullable()->default(null);
            $table->text('additional_data')->nullable()->default(null);
            $table->timestamps();

            // Indexes and foreign keys
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('owner_id')->references('id')->on('users');
            $table->index('owner_role_id');
            $table->index('approved');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_processes');
    }
}
