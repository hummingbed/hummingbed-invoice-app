<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number');
            $table->string('customer_id'); // Remove unsigned()
            $table->date('due_date');
            $table->date('date');
            $table->string('reference')->nullable();
            $table->text('terms_and_conditions');
            $table->double('sub_total');
            $table->double('total');
            $table->double('discount')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
