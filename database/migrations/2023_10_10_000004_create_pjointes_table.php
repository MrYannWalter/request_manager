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
        Schema::create('pjointes', function (Blueprint $table) {
            $table->id('pjointe_id'); // primary key
            $table->string('file_path');
            $table->unsignedBigInteger('request_id');
            $table->foreign('request_id')->references('request_id')->on('requests');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pjointes');
    }
};
