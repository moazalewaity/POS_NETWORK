@extends('layouts.dashboard.app')
@section('title' , " عرض الاشتراكات ")

@section('content')

<div class="row padd-30">
                <div class="col col-lg-12 col-sm-12 col-12">
                    <div class="table-st bg-w">
                        <div class="main-title">
                            <h3> جميع الاشتراكات    </h3>

                          
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

                                    <th> التفاصيل </th>
                                    <th> الكشف </th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($users as $index=>$user)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                        <a href="{{ route('dashboard.subscriptions.user-subscriptions' , $user->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> عرض </a>

                                        </td>
                                        <td>
                                        <a target="_new" href="{{ route('dashboard.subscriptions.generatePDF' , $user->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i> معاينة </a>
                                        <a download  href="{{ route('dashboard.subscriptions.generatePDF' , $user->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i> تنزيل  </a>

                                          </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            {{ $users->appends(request()->query())->links() }}

                        @else
                            <h3 style="font-weight: 400;">لا توجد بيانات بعد </h3>
                        @endif
                    </div>
                </div>
            </div><!-- end of tile -->
        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection