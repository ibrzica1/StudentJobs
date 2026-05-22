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
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn('expectetion');

            $table->text('expectation')
            ->nullable()
            ->after('tasks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expectation', function (Blueprint $table) {
            $table->dropColumn('expectation');
            
            $table->text('expectetion')
            ->nullable()
            ->after('tasks');
        });
    }
};
