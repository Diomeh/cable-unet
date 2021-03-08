<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceInternetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_internet', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('id_created_by');
            $table->float('bandwidth');
            $table->float('up_speed');
            $table->float('down_speed');
            $table->integer('type');
            $table->float('price');
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
        Schema::dropIfExists('service_internet');
    }
}
