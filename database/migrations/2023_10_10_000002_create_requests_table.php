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
        Schema::create('requests', function (Blueprint $table) {
            $table->id(); // Identifiant unique
            $table->string('request_title'); // Titre de la requête
            $table->text('request_description'); // Description de la requête
            $table->enum('status', ['soumise', 'en cours', 'traitée', 'rejetée'])->default('soumise'); // Statut de traitement
            $table->enum('priority', ['urgente', 'standard'])->default('standard'); // Priorité

            $table->unsignedBigInteger('category_id'); // Catégorie / type de requête
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->unsignedBigInteger('user_id'); // Étudiant qui soumet la requête
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('agent_id')->nullable(); // Agent affecté (nullable avant affectation)
            $table->foreign('agent_id')->references('id')->on('users')->onDelete('set null');

            $table->string('attachment_path')->nullable(); // Pièce jointe (PDF/image)

            $table->timestamp('submitted_at')->nullable(); 
            $table->timestamp('assigned_at')->nullable();  
            $table->timestamp('processed_at')->nullable(); 

            $table->text('internal_notes')->nullable(); 

            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
