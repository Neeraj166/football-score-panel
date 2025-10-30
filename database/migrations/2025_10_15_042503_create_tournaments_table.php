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
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('venue', 255)->nullable();
            $table->string('year', 255);
            $table->dateTime('date');
            $table->integer('no_of_teams')->default(0);
            $table->integer('tournamentType')->default(1);
            $table->enum('status', ['0', '1', '2', '3'])->default('0')->comment('0: not started, 1: tournament ongoing, 2: cancelled');
            $table->text('remarks')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tournaments');
    }
};
