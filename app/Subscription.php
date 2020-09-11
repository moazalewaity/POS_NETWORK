<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{

    protected $guarded = [];

    protected $dates = [
        'start_subscription',
        'end_subscription' ,
    ];

    // protected $casts = [
    //     'start_subscription'   => 'Y/m/d',
    //     'end_subscription'    => 'Y/m/d',
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
}
