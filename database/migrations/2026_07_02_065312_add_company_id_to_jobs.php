<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->foreignId('company_id')
            ->after('location_id')
            ->nullable();

            $table->foreign('company_id')
            ->references('id')
            ->on('companies');
        });
    }

    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropForeign('jobs_company_id_foreign');
            $table->dropColumn('company_id');
        });
    }
};
