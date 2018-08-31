<?php

namespace App\Models;

use App\Models\Model;

class Upload extends Model
{
    protected $fillable = ['firstname', 'lastname', 'avatar_filepath', 'badge_filepath'];

    public function kebabCaseFullName()
	{
		$exploded_firstname = explode(' ', trim($this->firstname));
		$exploded_lastname = explode(' ', trim($this->lastname));

		if(count($exploded_firstname) > 1)
		{
			$temp_firstname = str_replace(' ', '-', strtolower(trim($this->firstname)));
		}
		else
		{
			$temp_firstname = strtolower(trim($this->firstname));
        }
        
        if(count($exploded_lastname) > 1)
		{
			$temp_lastname = str_replace(' ', '-', strtolower(trim($this->lastname)));
		}
		else
		{
			$temp_lastname = strtolower(trim($this->lastname));
        }
        
        return $temp_firstname . '-' . $temp_lastname;
    }
}

?>
