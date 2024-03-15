<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// we can't use multiinheritance in larave so we like that in larave to achive multiinheritance 
class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $tabel = "customers";
    protected $primary_key = "id";
    // Mutatoer this is use to convert data befor you saved data into database
    public function setNameAttribute($value){
        $this->attributes["name"] = ucwords($value);
    }
}
