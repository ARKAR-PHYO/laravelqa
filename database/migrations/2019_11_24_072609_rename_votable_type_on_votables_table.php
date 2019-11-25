<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameVotableTypeOnVotablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('votables', function (Blueprint $table) {
            $table->renameColumn('votavle_type', 'votable_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('votables', function (Blueprint $table) {
            $table->renameColumn('votable_type', 'votavle_type');
        });
    }
}
