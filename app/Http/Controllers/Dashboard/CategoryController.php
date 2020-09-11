<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_categories')->only(['index']);
        $this->middleware('permission:create_categories')->only(['create', 'store']);
        $this->middleware('permission:update_categories')->only(['edit', 'update']);
        $this->middleware('permission:delete_categories')->only(['destroy']);

    }// end of __construct

    public function index()
    {
        $categories = Category::whenSearch(request()->search)
            ->whereNull('parent_id')
            ->paginate(30);
            
        if(\Request::query()){
            $categories = Category::whenSearch(request()->search)
            ->whereNotNull('parent_id')
            ->paginate(30);
        }
        

        return view('dashboard.categories.index', compact('categories'));

    }//end of index

    public function create()
    {
        // dd(\Request::query());
        $categories = Category::whereNull('parent_id')->get();
        return view('dashboard.categories.create' ,compact('categories'));

    }//end of create

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        // if($request->maincat){
        //     $request->request->add('maincat');
        // }

        Category::create($request->all());
        session()->flash('success', 'تمت إضافة البيانات بنجاح');
        return redirect()->route('dashboard.categories.index');

    }//end of store

    public function show()
    {

    }//end of show

    public function edit(Category $category)
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('dashboard.categories.edit', compact('category', 'categories'));

    }//end of edit

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
        ]);

        $category->update($request->all());
        session()->flash('success', 'تم تحديث البيانات بنجاح');
        return redirect()->route('dashboard.categories.index');

    }//end of update

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return redirect()->route('dashboard.categories.index');

    }//end of destroy

}//end of controller
