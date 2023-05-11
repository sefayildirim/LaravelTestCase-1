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
        Schema::create('capsules', function (Blueprint $table) {
            $table->id();
            $table->char('capsule_serial')->nullable();
            $table->char('capsule_id')->nullable();
            $table->char('status')->nullable();
            $table->dateTime('original_launch')->nullable();
            $table->integer('original_launch_unix')->nullable();
            $table->integer('landings');
            $table->char('type')->nullable();
            $table->text('details')->nullable();
            $table->integer('reuse_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capsules');
    }
};
