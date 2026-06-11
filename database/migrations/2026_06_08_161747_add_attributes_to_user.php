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
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstName')->after('password');
            $table->string('lastName')->after('firstName');
            $table->unsignedBigInteger('location_id')->after('lastName');
            $table->string('telephone')->after('location_id');
            $table->string('role')->after('telephone');

            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_location_id_foreign');
            $table->dropColumn(['firstName', 'lastName', 'location_id', 'telephone', 'role']);
        });
    }
};
