<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->year('year');
            $table->unsignedTinyInteger('month'); // 1-12
            $table->timestamps();

            $table->unique(['user_id', 'year', 'month']); // 1 budget per user per month
        });
    }

    public function down(): void {
        Schema::dropIfExists('budgets');
    }
};
