<?php

use munkireport\models\MRModel as Eloquent;

class I_munkireport_model extends Eloquent
{
    protected $table = 'i_munkireport';

    protected $hidden = ['id', 'serial_number'];

    protected $fillable = [
      'serial_number',
      'field_1',
      'field_2',
      'field_3',

    ];
}
