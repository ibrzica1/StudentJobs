<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('text',250);
            $table->foreignId('user_id')
            ->constrained('users')
            ->cascadeOnDelete();
            $table->foreignId('job_id')
            ->constrained('jobs')
            ->cascadeOnDelete();
            $table->string('status',9);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
