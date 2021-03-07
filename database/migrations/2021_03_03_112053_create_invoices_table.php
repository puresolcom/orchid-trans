<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('bid_id')->unsigned();
            $table->string('number');
            $table->string('reference_number');
            $table->integer('credit_days');
            $table->timestamp('approved_at')->nullable();
            $table->boolean('should_apply_vat')->default(1);
            $table->string('customer_reference')->nullable();
            $table->boolean('draft')->nullable()->default(1);

            // Indexes
            $table->index('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
