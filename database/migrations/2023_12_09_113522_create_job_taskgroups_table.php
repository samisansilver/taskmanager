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
        Schema::create('job_taskgroup', function (Blueprint $table){
            $table->id();
            $table->foreignId('job_id')->nullable()->constrained('jobs')->onUpdate('SET NULL')->onDelete('CASCADE');
            $table->foreignId('taskgroup_id')->nullable()->constrained('taskgroups')->onUpdate('SET NULL')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_taskgroup');
    }
};
