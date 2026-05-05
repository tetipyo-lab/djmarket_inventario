<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // =========================
        // SUPPLIERS
        // =========================
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);

            $table->string('document_type', 20)->nullable();
            $table->string('document_number', 50)->nullable();
            $table->string('verification_digit', 5)->nullable();
            $table->string('person_type', 20)->nullable();

            $table->text('address')->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('email', 150)->nullable();
            $table->text('contact_info')->nullable();

            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');

            $table->timestamps();
            $table->softDeletes();
        });

        // =========================
        // COMMISSIONS
        // =========================
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->decimal('percentage', 5, 2);
            $table->text('description')->nullable();

            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commissions');
        Schema::dropIfExists('suppliers');
    }
};