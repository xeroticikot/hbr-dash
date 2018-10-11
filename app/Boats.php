<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boats extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'owner', 'email', 'phone', 'notes', 'commission', 'boat_rep', 'boat_rep_email', 'boat_rep_phone'
    ];

    protected $table = 'boats';

    protected $rules = array(
        'name'  => 'required',
        'owner'  => 'required',
        'email'  => 'required',
        'phone'  => 'required',
    );
    protected $errors;

    public function validate($data)
    {
        $valid = Validator::make($data, $this->rules);
        if ($valid->fails())
        {
            $this->errors = $valid->errors();
            return false;
        }
        return true;
    }

    public function errors()
    {
        return $this->errors;
    }

}
