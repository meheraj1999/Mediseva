<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomeToDoctors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('about')->nullable();
            $table->string('education')->nullable();
            $table->string('experiences')->nullable();
            $table->string('contact')->nullable();
            $table->string('hospital')->nullable();
            $table->string('depertment')->nullable();
            $table->string('division')->nullable();
            $table->string('district')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            //
        });
    }
}
