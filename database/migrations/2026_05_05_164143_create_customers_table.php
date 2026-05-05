<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            $table->string('name', 150);

            $table->enum('document_type', ['RUC','CI'])->nullable();
            $table->string('document_number', 50);
            $table->string('verification_digit', 5)->nullable();

            $table->enum('person_type', ['FISICA','JURIDICA'])->nullable();

            $table->text('address')->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('email', 150)->nullable();

            // Relación opcional con usuario
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();

            // Auditoría
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();

            // Opcional: evitar duplicados lógicos
            $table->index(['document_number', 'document_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};