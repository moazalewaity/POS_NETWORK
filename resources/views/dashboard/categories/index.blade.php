@extends('layouts.dashboard.app')
@section('title' , "  عرض الاقسام ")

@section('content')

<div class="row padd-30">
                <div class="col col-lg-12 col-sm-12 col-12">
                    <div class="table-st bg-w">
                        <div class="main-title">
                            <h3> جميع الاقسام   </h3>

                            <form action="">
                            <div class="ml-auto">
                                  <div class=" col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="search" autofocus class="form-control" placeholder="search" value="{{ request()->search }}">
                                    </div>
                                </div>
                                </div>
                            <button type="submit" class="m-btn btn btn-primary mr-2"><i class="fa fa-search"></i> بحث</button>
                                    @if (auth()->user()->hasPermission('create_categories'))
                                        <a href="{{ route('dashboard.categories.create') }}{{ \Request::query() ? "?maincat=1" : ""}} " class="m-btn btn btn-primary"><i class="fa fa-plus"></i> انشاء</a>
                                    @endif
                        </form>
                        </div>


                        @if ($categories->count() > 0)
                        <div class="table-responsive">
                            <table id="opened-Auctions" class="text-center table table-striped table-bordered" style="width:100%">
                                <thead class="text-center">
                                <tr >
                                    <th>#</th>
                                    <th style="width:50%">الاسم</th>
                                    @if(\Request::query())
                                    <th>القسم الرئيسيى  </th>
                                    @endif
                                    <th>الاكشن </th>
                                </tr>
                                </thead>

                                <tbody class="text-center">
                                @foreach ($categories as $index=>$category)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        @if(\Request::query())
                                        {{-- @if(\Request::getQueryString() == "=sub_categories") --}}
                                        <td>
                                            <h1 class="badge badge-primary">
                                                {{ $category->parent->name }}
                                            </h1>
                                             </td>
                                        @endif
                                        {{-- @endif --}}
                                        <td>
                                        

                                        @if (auth()->user()->hasPermission('create_categories'))
                                                <a href="{{ route('dashboard.categories.create') }}?maincat={{ $category->id}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> اضافة قسم فرعى </a>
                                            @endif
                                            @if (auth()->user()->hasPermission('create_categories'))
                                                <a href="{{ route('dashboard.categories.edit' , $category->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                            @endif
                                            @if (auth()->user()->hasPermission('delete_categories'))
                                                <form method="post" action="{{ route('dashboard.categories.destroy', $category->id) }}" style="display: inline-block;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> حذف</button>
                                                </form><!-- end of form -->
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                            </div>

                            {{ $categories->appends(request()->query())->links() }}

                        @else
                            <h3 style="font-weight: 400;">
                           لا توجد بيانات بعد 
                            </h3>
                        @endif
                    </div>
         
 
  

@endsection