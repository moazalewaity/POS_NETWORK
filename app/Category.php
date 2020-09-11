<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name' , 'parent_id'];

    //attributes----------------------------------
    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }// end of getNameAttribute

    //relations ----------------------------------

    public function children()
  {
    return $this->hasMany('App\Category', 'parent_id');
  }
  
    public function parent()
        {
            return $this->belongsTo(Category::class, 'parent_id');
        }

    //scopes --------------------------------------
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });

    }// end of scopeWhenSearch

}//end of model

