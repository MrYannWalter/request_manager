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
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id('user_id'); // primary key
            $table->string('firstname');
            $table->string('lastname');
            $table->string('sexe');
            $table->string('telephone');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('service_code');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs'); // updated table name
    }
};
