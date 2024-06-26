<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trsassesments', function (Blueprint $table) {
            $table->uuid('id')->default(DB::raw('uuid_generate_v4()'));
            $table->uuid('assesmentgroupID');
            $table->uuid('studentID');
            $table->uuid('lectureID');
            $table->uuid('yearID');
            $table->uuid('semesterID');
            $table->integer('Grantotal');
            $table->integer('active',false,'1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trsassesments');
    }
};
