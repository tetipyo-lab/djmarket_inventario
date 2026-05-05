<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name', 150);
            $table->text('description')->nullable();

            // Precios (normalizados en inglés)
            $table->decimal('cost_price', 12, 2);
            $table->decimal('profit_percentage', 5, 2);
            $table->decimal('final_price', 12, 2);

            $table->integer('stock')->default(0);

            // Relación
            $table->foreignId('category_id')->nullable()
                ->constrained('categories')
                ->nullOnDelete();

            // Auditoría
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();

            // Índices útiles
            $table->index('name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};