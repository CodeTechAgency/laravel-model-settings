<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('root');
            $table->string('path')->unique();
            $table->string('name');
            $table->string('scope');
            $table->text('value');
            $table->unsignedBigInteger('settingable_id');
            $table->string('settingable_type');
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
        Schema::dropIfExists('model_settings');
    }
}
