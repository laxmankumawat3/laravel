<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{

    use HasFactory;
   
    public function getGroups (){
        // pass two parameter one is that table mode and second one is that foreign key ; this is one to one only find one group one data hasOne 
        // return $this->hasOne('App\Models\Groups', 'group_id');
        // one to many relationship hasMany();
        // first group_id -> foreign key and second id Groups ki primary key hai that not conflict ;
        return $this->hasMany('App\Models\Groups', 'group_id','group_id');
    }

}
