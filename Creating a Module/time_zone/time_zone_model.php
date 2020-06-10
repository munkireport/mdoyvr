<?php

use munkireport\models\MRModel as Eloquent;

class Time_zone_model extends Eloquent
{
    protected $table = 'time_zone';

    protected $hidden = ['id', 'serial_number'];

    protected $fillable = [
      'serial_number',
      'time_zone',
      'network_time_server',
      'network_time_enabled',
      'auto_time_zone',

    ];
}
