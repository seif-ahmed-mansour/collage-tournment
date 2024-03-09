<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {


        Schema::create('team_event_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->nullable()->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade'); // many to many relationship
            $table->foreignId('team_id')
                ->nullable()->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade'); // many to many relationship
            $table->foreignId('team_event_id')
                ->nullable()->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade'); // many to many relationship
            $table->unsignedInteger('score')->default(0);
            $table->timestamps();
            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('user');
            // $table->unsignedBigInteger('team_id');
            // $table->foreign('team_event_id')->references('id')->on('team_events');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('team_event_participants');
    }
};
