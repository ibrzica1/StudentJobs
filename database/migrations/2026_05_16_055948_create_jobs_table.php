<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * There will be two kind of jobs.
     * One is standard job with contract, full time, part time, weekly hours.
     * Second is helper job, that can be done in a day, payed by the hour or fixed pay
     * for few hours work.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title',60);
            $table->foreignId('employer_id')
            ->constrained('users')
            ->cascadeOnDelete();
            $table->string('address')->nullable();
            $table->string('setting_type',30)->nullable();
            $table->integer('weekly_hours')->nullable();
            $table->integer('employee_amount')->default(1);
            $table->decimal('wage', 10, 2)->nullable();
            $table->string('duration',20);
            $table->boolean('urgent')->default(0);
            $table->text('description');
            $table->text('tasks')->nullable();
            $table->text('expectetion')->nullable();
            $table->text('offer')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
