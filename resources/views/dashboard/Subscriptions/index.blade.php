@extends('layouts.dashboard.app')
@section('title' , " عرض الاشتراكات ")

@section('content')

<div class="row padd-30">
                <div class="col col-lg-12 col-sm-12 col-12">
                    <div class="table-st bg-w">
                        <div class="main-title">
                            <h3>
                             جميع الاشتراكات   :
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
                            @if (auth()->user()->hasPermission('create_subscriptions'))
                                        <a href="{{ route('dashboard.subscriptions.create') }}" class="m-btn btn btn-primary"><i class="fa fa-plus"></i> انشاء</a>
                                    @else
                                        <a href="#" disabled="" class="m-btn btn btn-primary"><i class="fa fa-plus"></i> انشاء</a>
                                    @endif
                        </form>
                        </div>


                        @if ($users->count() > 0)
                          <div class="table-responsive">
                            <table id="opened-Auctions" class="table table-striped table-bsubscriptioned" style="width:100%">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>نوع الاشتراك </th>
                                    <th> بداية الاشتراك</th>
                                    <th> نهاية الاشتراك  </th>
                                    <th>  شهر الاشتراك  </th>
                                    <th> المبلغ المدفوع  </th>
                                    <th>   المبلغ المتبقى   </th>
                                    <th>  حالة الدفع   </th>
                                    <th>الاكشن</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($users as $user)
                                @foreach ($user->subscriptions as $index=>$subscription)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $subscription->user['name'] }}</td>
                                        <td>{{ $subscription->catgory->name }}</td>
                                        <td>{{ $subscription->start_subscription->format('m/d/Y') }}</td>
                                        <td>
                                        {{ $subscription->end_subscription->format('m/d/Y') }}
                                        </td>
                                        <td>
                                            <span class="t-status-c">
                                                  {{ $subscription->month }} / {{ $subscription->year }}
                                                 </span>
                                        </td>
                                        <td>{{ $subscription->batch}}</td>
                                        <td>{{ (int)str_replace('شيكل' , '' , $subscription->catgory->name) - $subscription->batch }}</td>

                                        <td>
                                           @if($subscription->status == 1) 
                                           <span class='t-status-o'>تم الدفع </span>
                                           @else
                                           <span class='t-status-c'>لم يدفع بعد </span>
                                           @endif
                                        </td>
                                        <td>
                                            @if (auth()->user()->hasPermission('update_subscriptions'))
                                                <a href="{{ route('dashboard.subscriptions.edit', $subscription->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                            @endif
                                            @if (auth()->user()->hasPermission('delete_subscriptions'))
                                                <form method="post" action="{{ route('dashboard.subscriptions.destroy', $subscription->id) }}" style="display: inline-block;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> حذف</button>
                                                </form><!-- end of form -->
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                @endforeach

                                </tbody>
                                

                            </table>
                            <a href="{{ route('dashboard.subscriptions.index') }}" class="btn btn-primary btn-sm">
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