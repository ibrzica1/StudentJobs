<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('car_available')->after('role')->nullable();
             $table->boolean('truck_licence')->after('role')->nullable();
             $table->boolean('car_licence')->after('role')->nullable();
             $table->string('university')->after('role')->nullable();
             $table->string('certificates')->after('role')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('car_available');
            $table->dropColumn('truck_licence');
            $table->dropColumn('car_licence');
            $table->dropColumn('university');
            $table->dropColumn('certificates');
        });
    }
};
