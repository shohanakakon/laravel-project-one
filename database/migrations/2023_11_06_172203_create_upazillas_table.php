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
        Schema::create('upazillas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('thana_id');
            $table->foreign('thana_id')->references('id')->on('thanas')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->boolean('status')->default(1)->comment('1 = active, 0 = deactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upazillas');
    }
};
