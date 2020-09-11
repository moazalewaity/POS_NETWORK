@extends('layouts.dashboard.app')
@section('title' , " عرض نقاط البيع ")

@section('content')

<div class="row padd-30">
                <div class="col col-lg-12 col-sm-12 col-12">
                    <div class="table-st bg-w">
                        <div class="main-title">
                            <h3> جميع نقاط البيع    </h3>

                            <form action="">
                            <div class="ml-auto">
                                  <div class=" col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="search" autofocus class="form-control" placeholder="search" value="{{ request()->search }}">
                                    </div>
                                </div>

                             

                                </div>
                            <button type="submit" class="m-btn btn btn-primary mr-2"><i class="fa fa-search"></i> بحث</button>
                            @if (auth()->user()->hasPermission('create_cards'))
                                        <a href="{{ route('dashboard.pos.create') }}" class="m-btn btn btn-primary"><i class="fa fa-plus"></i> انشاء</a>
                                    @else
                                        <a href="#" disabled="" class="m-btn btn btn-primary"><i class="fa fa-plus"></i> انشاء</a>
                                    @endif
                        </form>
                        </div>


                        @if ($pos->count() > 0)
                          <div class="table-responsive">
                            <table id="opened-Auctions" class="table table-striped table-bsubscriptioned" style="width:100%">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>رقم الجوال</th>
                                    <th>النوع </th>
                                    <th> المكان</th>
                                    <th>  حالة نقطة البيع    </th>
                                    <th>الاكشن</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($pos as $index=>$item)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->place }}</td>
                                        <td>
                                           @if($item->status == 1) 
                                           <span class='t-status-o'>نشطة  </span>
                                           @else
                                           <span class='t-status-c'>غير نشطة </span>
                                           @endif
                                        </td>
                                        <td>
                                            @if (auth()->user()->hasPermission('update_cards'))
                                                <a href="{{ route('dashboard.pos.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                                <a href="{{ route('dashboard.cards.user-cards', $item->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-tasks  "></i> ادارة</a>

                                            @endif
                                            @if (auth()->user()->hasPermission('delete_cards'))
                                                <form method="post" action="{{ route('dashboard.pos.destroy', $item->id) }}" style="display: inline-block;">
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
                           


                        @else
                            <h3 style="font-weight: 400;">لا توجد بيانات بعد </h3>
                        @endif
                    </div>
                </div>
            </div><!-- end of tile -->
        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection