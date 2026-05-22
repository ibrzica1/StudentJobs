<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->time('from')
            ->nullable()
            ->change();

            $table->time('to')
            ->nullable()
            ->change();
        });
    }

    public function down(): void
    {
        Schema::table('nullable', function (Blueprint $table) {
            //
        });
    }
};
