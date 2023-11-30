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
        Schema::create('moto', function (Blueprint $table) {
            $table->id();
            $table->string('brand', 40);
            $table->string('model', 50);
            $table->integer('year');
            $table->integer('displacement');
            $table->integer('power')->nullable();
            $table->enum('license', ['AM', 'A1', 'A2', 'A']);
            $table->integer('weight')->nullable();
            $table->string('type', 25);
            $table->decimal('prize', 10, 2)->nullable();
            $table->string('matricula', 10)->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moto');
    }
};
