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
        Schema::create('deliveries_equipment', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->integer('deliverable_id');
            $table->integer('delivered_by');
            $table->enum('deliverable_type', ['equipment']);
            $table->timestamp('delivery_date');
            $table->timestamp('return_date')->nullable();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('deliverable_id')->references('id')->on('equipments')->cascadeOnUpdate()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliveries_equiments');
    }
};
