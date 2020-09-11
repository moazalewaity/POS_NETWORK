<?php

namespace App\Http\Controllers\Dashboard;

use App\Subscription;
use App\Category;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_subscriptions')->only(['index']);
        $this->middleware('permission:create_subscriptions')->only(['create', 'store']);
        $this->middleware('permission:update_subscriptions')->only(['edit', 'update']);
        $this->middleware('permission:delete_subscriptions')->only(['destroy']);

    }// end of __construct

    public function index()
    {
        $subscriptions = Subscription::whenSearch(request()->search)
            ->paginate(15);

        $users = User::whereRoleNot('super_admin')->with('subscriptions')->has('subscriptions')->paginate(15);
            
        if(\Request::query()){
            $subscriptions = Subscription::whenSearch(request()->search)
            ->paginate(15);

            $users = User::whenSearch(request()->search)->whereRoleNot('super_admin')->with('subscriptions')->paginate(15);

        }
        
    //   dd($users );
        return view('dashboard.subscriptions.list', compact('subscriptions' , 'users'));

    }//end of index


    public function user_subscriptions($id){

        // $subscriptions = Subscription::whenSearch(request()->search)
        // ->paginate(15);

    $users = User::where('id', $id)->with('subscriptions')->get();
        
    if(\Request::query()){
        $users = User::where('id', $id)->whenSearch(request()->search)->with('subscriptions')->get();

    } 

        return view('dashboard.subscriptions.index', compact('users'));

     }

    public function create()
    {
        // dd(\Request::query());
        $users = User::whereRoleNot('super_admin')->get();
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('dashboard.subscriptions.create' ,compact('categories' , 'users'));

    }//end of create

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|unique:subscriptions,name',
        // ]);
           $request->request->add(['year' => date('Y')]);
        //    dd($request->start_subscription);

       $start_subscription1=  Carbon::parse($request->start_subscription)->format('Y-m-d h:i:s');
       $end_subscription1 =  Carbon::parse($request->end_subscription)->format('Y-m-d h:i:s');
        // dd($end_subscription1 );
    //    Subscription::create( $request->all() ) ;
        Subscription::create([
            'user_id' => $request->user_id ,
            'category_id' => $request->category_id ,
            'start_subscription'=>  $start_subscription1 ,
            'end_subscription'=> $end_subscription1 ,
            'month'=> $request->month ,
            'year'=> $request->year ,
            'status'=> $request->status 
        ]);
        session()->flash('success', 'تمت إضافة البيانات بنجاح');
        return redirect()->route('dashboard.subscriptions.index');

    }//end of store

    public function show()
    {

    }//end of show

    public function edit( Subscription $Subscription)
    {
        $users = User::whereRoleNot('super_admin')->get();
        $categories = Category::whereNull('parent_id')->with('children')->get();

        return view('dashboard.subscriptions.edit', compact('Subscription', 'categories' , 'users'));

    }//end of edit

    public function update(Request $request, Subscription $Subscription)
    {
        // $request->validate([
        //     'name' => 'required|unique:subscriptions,name,' . $Subscription->id,
        // ]);

        $Subscription->update($request->all());
        session()->flash('success', 'تم تحديث البيانات بنجاح');
        return redirect()->route('dashboard.subscriptions.index');

    }//end of update

    public function destroy(Subscription $Subscription)
    {
        $Subscription->delete();
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return redirect()->route('dashboard.subscriptions.index');

    }//end of destroy


    public function generatePDF($id)
    {
        // dd("vbbvn");
        // $user = User::where('id', $id)->with('subscriptions')->get();
        $user =User::with('subscriptions')->find($id);
        // dd($user->subscriptions);
        return view('dashboard.subscriptions.pdf1' , compact('user'));
    }

}//end of controller
