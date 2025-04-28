<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResponsableIdToRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('requests', function (Blueprint $table) {
        $table->unsignedBigInteger('responsable_id')->nullable()->after('agent_id');
        $table->foreign('responsable_id')->references('id')->on('users')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('requests', function (Blueprint $table) {
        $table->dropForeign(['responsable_id']);
        $table->dropColumn('responsable_id');
    });
}

}
