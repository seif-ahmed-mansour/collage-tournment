<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {


        Schema::create('team_events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('category', ['sports', 'academic']);
            $table->timestamps();
            // $table->boolean('category')->comment('if 0 sporting if 1 academic');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('team_events');
    }
};
