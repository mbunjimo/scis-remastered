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
        Schema::create('announcements', function(Blueprint $table){
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->date('expiry_date')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->string('status')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->integer('priority')->nullable()->default(1); // 1 is the highest priority
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('announcements');
    }
};
