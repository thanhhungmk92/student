<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Student extends Model
{
    //
    use Searchable;
    protected $table="students";
    protected $fillable = ['name','date_of_birth','school_id','address'];

     public function searchableAs()
    {
       return 'name';
    }

    public function toSearchableArray()
   {
      $array = $this->toArray();
      return $array;
   }

    public function school()
    {
    	return $this->belongsto('App\School','school_id','id');
    }
}
