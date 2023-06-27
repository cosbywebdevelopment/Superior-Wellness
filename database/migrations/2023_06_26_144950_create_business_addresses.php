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
        Schema::create('business_addresses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('contacts_id');

            $table->foreign('contacts_id')->references('id')->on('contacts');
            $table->text('address')->nullable();

            $table->tinyInteger('billing')->default('0');
            $table->tinyInteger('shipping')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_addresses');
    }
};
