<?php

namespace App\Http\Controllers\Dashboard;

use App\Card;
use App\Category;
use App\Pos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CardController extends Controller
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
        $cards = Card::whenSearch(request()->search)
            ->paginate(15);

            
        if(\Request::query()){
            $cards = Card::whenSearch(request()->search)
            ->paginate(15);
        }
        
    //   dd($users );
        return view('dashboard.cards.index', compact('cards'));

    }//end of index


    public function user_cards($id){

        // $Cards = Card::whenSearch(request()->search)
        // ->paginate(15);

    $pos  = Pos::with('cards')->find($id);
    //    dd( $Card->cards );  
    if(\Request::query()){
        $pos  = Pos::where('id', $id)->whenSearch(request()->search)->with('cards')->get();

    } 


        return view('dashboard.cards.index', compact('pos'));

     }

    public function create()
    {
        // dd(\Request::query());
        return view('dashboard.cards.create');

    }//end of create

    public function store(Request $request)
    {
        $request->validate([
            'pos_id' => 'required',
            'type_paid' => 'required',
            'quantity' => 'required',
            'status' => 'required',
        ]);
        $request->request->add(['year' => date('Y')]);
        if($request->type_paid == 1 ){
            $request->request->add(['ratio' => "15%"]);
        }else{
            $request->request->add(['ratio' => "10%"]);
        }
      
    //   dd($request->all());
       Card::create( $request->all() ) ;
       
        session()->flash('success', 'تمت إضافة البيانات بنجاح');
        return redirect()->route('dashboard.cards.user-cards' , $request->pos_id);

    }//end of store

    public function show()
    {

    }//end of show

    public function edit($id)
    {
     $card = Card::find($id);
        return view('dashboard.cards.edit', compact('card'));

    }//end of edit

    public function update(Request $request, Card $Card)
    {
        $request->validate([
            // 'pos_id' => 'required',
            'type_paid' => 'required',
            'quantity' => 'required',
            'status' => 'required',
        ]);

        $request->request->add(['year' => date('Y')]);
        if($request->type_paid == 1 ){
            $request->request->add(['ratio' => "15%"]);
        }else{
            $request->request->add(['ratio' => "10%"]);
        }

        $Card->update($request->all());
        session()->flash('success', 'تم تحديث البيانات بنجاح');
        return redirect()->route('dashboard.cards.user-cards' , $request->pos_id);

        // return redirect()->route('dashboard.pos.index');

    }//end of update

    public function destroy(Card $Card)
    {
        $Card->delete();
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return redirect()->route('dashboard.cards.index');

    }//end of destroy


    public function generatePDF($id)
    {
        // dd("vbbvn");
        // $user = User::where('id', $id)->with('Cards')->get();
        $user =User::with('Card')->find($id);
        // dd($user->Cards);
        return view('dashboard.Cards.pdf' , compact('user'));
    }

}//end of controller
