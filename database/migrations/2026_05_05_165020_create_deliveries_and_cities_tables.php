<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // =========================
        // DELIVERIES
        // =========================
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();

            $table->string('name', 150);
            $table->text('contact_info')->nullable();

            // Auditoría
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();

            $table->unique('name');
        });

        // =========================
        // CITIES
        // =========================
        Schema::create('cities', function (Blueprint $table) {
            $table->id();

            $table->string('name', 150);
            $table->text('range')->nullable(); // zona o cobertura

            // Auditoría
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();

            $table->unique('name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cities');
        Schema::dropIfExists('deliveries');
    }
};