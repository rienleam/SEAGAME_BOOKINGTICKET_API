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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->date("date");
            $table->unsignedBigInteger("stadia_id");
            $table->foreign("stadia_id")
                    ->references("id")
                    ->on("stadias")
                    ->onDelete("cascade");
            $table->unsignedBigInteger("sport_id");
            $table->foreign("sport_id")
                    ->references("id")
                    ->on("sports")
                    ->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
