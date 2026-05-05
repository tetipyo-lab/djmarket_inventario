<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // =========================
        // ROLES
        // =========================
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->text('description')->nullable();

            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');

            $table->timestamps();
            $table->softDeletes();
        });

        // =========================
        // USERS (ALTER)
        // =========================
        Schema::table('users', function (Blueprint $table) {
            // Nuevas columnas
            $table->foreignId('role_id')->nullable()->after('id')->constrained('roles');
            $table->foreignId('supplier_id')->nullable()->after('role_id');
            $table->foreignId('commission_id')->nullable()->after('supplier_id');

            $table->foreignId('created_by')->nullable()->after('password')->constrained('users');
            $table->foreignId('updated_by')->nullable()->after('created_by')->constrained('users');

            $table->softDeletes();
        });
    }

    public function down(): void
    {
        // USERS rollback
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropForeign(['created_by']);
            $table->dropForeign(['updated_by']);

            $table->dropColumn([
                'role_id',
                'supplier_id',
                'commission_id',
                'created_by',
                'updated_by',
                'deleted_at'
            ]);
        });

        // ROLES rollback
        Schema::dropIfExists('roles');
    }
};