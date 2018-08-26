<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    /**
     * Format Date
    *
    * @param Date
    * @return Date
    */
    public function getCreatedAtAttribute($value)
    {
        return date("M d, Y - h:ia", strtotime($value));
        }
}
