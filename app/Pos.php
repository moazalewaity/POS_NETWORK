<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pos extends Model
{

    protected $table = "pos";


    protected $guarded = [];

    // protected $dates = [
    //     'start_subscription',
    //     'end_subscription' ,
    // ];

    
    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });

    }// end of scopeWhenSearch

    public function catgory()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function cards()
    {
        return $this->hasMany(Card::class );
    }
}
