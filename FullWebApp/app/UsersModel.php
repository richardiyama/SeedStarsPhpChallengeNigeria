<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model {

    protected $table = 'users';
    public $timestamps = false;

    public function scopeFreeSearch($query, $value) {

        return $query->where('id', 'like', '%' . $value . '%')
                        ->orWhere('name', 'like', '%' . $value . '%')
                        ->orWhere('email', 'like', '%' . $value . '%');
    }

}
