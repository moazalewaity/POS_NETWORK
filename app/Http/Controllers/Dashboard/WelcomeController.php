<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\Movie;
use App\User;
use App\Order;
use App\Pos;
use App\Subscription;
use Carbon\Carbon;
class WelcomeController extends Controller
{
    public function index()
    {
        $users_count = User::whereRole('user')->count();
        $categories_count = Category::count();
        $subscriptions_count = Subscription::count();
        $subscriptions = Subscription::where('status' , 0)->get();
        $subscriptions1 = Subscription::whereDate('end_subscription' , '<', date('Y-m-d').' 00:00:00' )->get();
        $pos = Pos::where('status', 1 )->get();

        $pos_count = Pos::count();


        return view('dashboard.welcome', compact('pos_count' , 'pos' , 'subscriptions_count' , 'subscriptions', 'subscriptions1', 'users_count', 'categories_count'));

    }// end of index

}//end of controller
