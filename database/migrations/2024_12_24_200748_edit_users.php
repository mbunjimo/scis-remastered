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
        //
        // Create roles table
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Add columns to users table
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->string('country')->nullable()->default('Tanzania');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->string('status')->nullable()->default('inactive');
            $table->string('image')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop columns from users table
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('status');
            $table->dropColumn('image');
        });

        // Drop roles table
        Schema::dropIfExists('roles');

    }
};
