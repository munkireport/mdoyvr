<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class TimeZoneInit extends Migration
{
    public function up()
    {
        $capsule = new Capsule();
        $capsule::schema()->create('time_zone', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number');
            $table->string('time_zone')->nullable();
            $table->string('network_time_server')->nullable();
            $table->boolean('network_time_enabled')->nullable();
            $table->boolean('auto_time_zone')->nullable();

            $table->unique('serial_number');
            $table->index('time_zone');
            $table->index('network_time_server');
            $table->index('network_time_enabled');
            $table->index('auto_time_zone');

        });
    }
    
    public function down()
    {
        $capsule = new Capsule();
        $capsule::schema()->dropIfExists('time_zone');
    }
}
