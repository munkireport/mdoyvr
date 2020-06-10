<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class IMunkireportInit extends Migration
{
    public function up()
    {
        $capsule = new Capsule();
        $capsule::schema()->create('i_munkireport', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number');
            $table->string('field_1')->nullable();
            $table->string('field_2')->nullable();
            $table->string('field_3')->nullable();

            $table->unique('serial_number');
            $table->index('field_1');
            $table->index('field_2');
            $table->index('field_3');

        });
    }
    
    public function down()
    {
        $capsule = new Capsule();
        $capsule::schema()->dropIfExists('i_munkireport');
    }
}
