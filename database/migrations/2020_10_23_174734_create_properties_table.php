<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
Schema::create('properties', function (Blueprint $table) {
$table->id();
$table->string('name');
$table->string('lotarea');
$table->string('floorarea');
$table->string('location');
$table->string('bedroom');
$table->string('bathroom');
$table->string('garage');
$table->text('others');
$table->integer('price');
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
Schema::dropIfExists('properties');
}
}