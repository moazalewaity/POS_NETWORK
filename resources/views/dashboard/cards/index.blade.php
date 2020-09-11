@extends('layouts.dashboard.app')
@section('title' , " ادارة نقطة البيع ")

@section('content')

<div class="row padd-30">
                <div class="col col-lg-12 col-sm-12 col-12">
                    <div class="table-st bg-w">
                        <div class="main-title">
                            <h3>
                                ادارة  نقاط البيع    :  {{ $pos->name}}
                              </h3>

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
                                        <a href="{{ route('dashboard.cards.create') }}?pos_id={{$pos->id}}" class="m-btn btn btn-primary"><i class="fa fa-plus"></i> انشاء</a>
                                    @else
                                        <a href="#" disabled="" class="m-btn btn btn-primary"><i class="fa fa-plus"></i> انشاء</a>
                                    @endif
                        </form>
                        </div>


                        @if ($pos->cards->count() > 0)
                          <div class="table-responsive">
                            <table id="opened-Auctions" class="table table-striped table-bsubscriptioned" style="width:100%">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الكمية </th>
                                    <th>نوع الدفع  </th>
                                    <th> النسبة</th>
                                    <th> الشهر</th>
                                    <th>  الحالة    </th>
                                    <th>  الدفعة     </th>
                                    <th>  الدفعة المتبقية     </th>
                                    <th>الاكشن</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($pos->cards as $index=>$item)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>
                                        @if($item->type_paid == 1)
                                        <span class='t-status-o'> مسبق الدفع   </span>
                                       
                                        @else 
                                        <span class='t-status-c'>دفع مؤجل  </span>
                                        
                                        @endif
                                        </td>
                                        <td>{{ $item->ratio }}</td>
                                        <td>{{ $item->month }} / {{ $item->year }}</td>
                                        <td>
                                           @if($item->status == 1) 
                                           <span class='t-status-o'>نشطة  </span>
                                           @else
                                           <span class='t-status-c'>غير نشطة </span>
                                           @endif
                                        </td>

                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->price  - $item->price_paid }}</td>
                                        <td>
                                            @if (auth()->user()->hasPermission('update_cards'))
                                                <a href="{{ route('dashboard.cards.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                            @endif
                                            @if (auth()->user()->hasPermission('delete_cards'))
                                                <form method="post" action="{{ route('dashboard.cards.destroy', $item->id) }}" style="display: inline-block;">
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
                            <a href="{{ route('dashboard.pos.index') }}" class="btn btn-primary btn-sm">
                            <img src="{{ asset('dashboard_files/img/icons/exchange.svg')}}" />
                             رجوع
                             </a>


                        @else
                            <h3 style="font-weight: 400;">لا توجد بيانات بعد </h3>
                        @endif
                    </div>
                </div>
            </div><!-- end of tile -->
        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection