<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('individual_event_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('individual_event_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');;
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedInteger('score')
                ->unsigned()
                ->default(0);
            $table->timestamps();
            // $table->foreign('user_id')->references('id')->on('user'); 
            // $table->foreign('individual_event_id')->references('id')->on('individual_events');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('individual_event_participants');
    }
};
