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
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id(); // A_I primary key
            $table->dateTime('start_date'); // start date and time
            $table->dateTime('end_date'); // end date and time
            $table->string('employee_name'); // employee
            $table->text('notes')->nullable(); // notes
            $table->enum('status', ['open', 'completed','other'])->default('open'); // status of order
            $table->text('image_paths')->nullable(); // image paths (multiple paths JSON or serialized data)
            $table->timestamps(); // created_at and updated_at

            $table->index(['start_date', 'end_date']); // Index for date range queries
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_orders');
    }
};