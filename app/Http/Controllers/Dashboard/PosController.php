<?php

namespace App\Http\Controllers\Dashboard;

use App\Pos;
use App\Category;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PosController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_cards')->only(['index']);
        $this->middleware('permission:create_cards')->only(['create', 'store']);
        $this->middleware('permission:update_cards')->only(['edit', 'update']);
        $this->middleware('permission:delete_cards')->only(['destroy']);

    }// end of __construct

    public function index()
    {
        $pos = Pos::whenSearch(request()->search)
            ->paginate(15);

            
        if(\Request::query()){
            $pos = Pos::whenSearch(request()->search)
            ->paginate(15);
        }
        
    //   dd($users );
        return view('dashboard.pos.index', compact('pos'));

    }//end of index


    public function user_Poss($id){

        // $Poss = Pos::whenSearch(request()->search)
        // ->paginate(15);

    $users = User::where('id', $id)->with('Poss')->get();
        
    if(\Request::query()){
        $users = User::where('id', $id)->whenSearch(request()->search)->with('Poss')->get();

    } 


        return view('dashboard.pos.index', compact('users'));

     }

    public function create()
    {
        // dd(\Request::query());
        return view('dashboard.pos.create');

    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'place' => 'required',
            'status' => 'required',
        ]);

       Pos::create( $request->all() ) ;
       
        session()->flash('success', 'تمت إضافة البيانات بنجاح');
        return redirect()->route('dashboard.pos.index');

    }//end of store

    public function show()
    {

    }//end of show

    public function edit($id)
    {
     $Pos = Pos::find($id);
        return view('dashboard.pos.edit', compact('Pos'));

    }//end of edit

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'place' => 'required',
            'status' => 'required',
        ]);
        //   dd($request->all());
        $Pos= Pos::find($id);
        $Pos->update($request->all());
        session()->flash('success', 'تم تحديث البيانات بنجاح');
        return redirect()->route('dashboard.pos.index');

    }//end of update

    public function destroy($id)
    {    
        // dd($Pos);
        $Pos = Pos::find($id)->delete();
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return redirect()->route('dashboard.pos.index');

    }//end of destroy


    public function generatePDF($id)
    {
        // dd("vbbvn");
        // $user = User::where('id', $id)->with('Poss')->get();
        $user =User::with('pos')->find($id);
        // dd($user->Poss);
        return view('dashboard.Poss.pdf' , compact('user'));
    }

}//end of controller
