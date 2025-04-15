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
        Schema::create('branches', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->startingValue(101);
            $table->string('branch_name', 255)->nullable(false);
            $table->string('email', 255)->unique()->nullable(false);
            $table->text('address')->nullable(false);
            $table->string('upazila', 100)->nullable(false);
            $table->string('phone', 20)->nullable();
            $table->string('login_username', 100)->unique()->nullable(false);
            $table->string('password_hash', 255)->nullable(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // For MySQL specifically to set auto-increment start
        DB::statement("ALTER TABLE branches AUTO_INCREMENT = 101;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
