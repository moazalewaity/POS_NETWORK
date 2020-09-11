@extends('layouts.dashboard.app')
@section('title' , " عرض المستخدمين ")

@section('content')

<div class="row padd-30">
                <div class="col col-lg-12 col-sm-12 col-12">
                    <div class="table-st bg-w">
                        <div class="main-title">
                            <h3> جميع المستخدمين    </h3>

                            <form action="">
                            <div class="ml-auto">
                                  <div class=" col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="search" autofocus class="form-control" placeholder="search" value="{{ request()->search }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="role_id" class="form-control">
                                            <option value="">All Roles</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}" {{ request()->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- end of col -->

                                </div>
                            <button type="submit" class="m-btn btn btn-primary mr-2"><i class="fa fa-search"></i> بحث</button>
                            @if (auth()->user()->hasPermission('create_users'))
                                        <a href="{{ route('dashboard.users.create') }}" class="m-btn btn btn-primary"><i class="fa fa-plus"></i> انشاء</a>
                                    @else
                                        <a href="#" disabled="" class="m-btn btn btn-primary"><i class="fa fa-plus"></i> انشاء</a>
                                    @endif
                        </form>
                        </div>


                        @if ($users->count() > 0)
                          <div class="table-responsive">
                            <table id="opened-Auctions" class="table table-striped table-bordered" style="width:100%">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>الايميل</th>
                                    <th>رقم الجوال</th>
                                    <th>الصلاحية</th>
                                    <th>الاكشن</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($users as $index=>$user)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>
                                            @foreach ($user->roles as $role)
                                                <h5 style="display: inline-block;"><span class="badge badge-primary">{{ $role->name }}</span></h5>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if (auth()->user()->hasPermission('update_users'))
                                                <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                            @endif
                                            @if (auth()->user()->hasPermission('delete_users'))
                                                <form method="post" action="{{ route('dashboard.users.destroy', $user->id) }}" style="display: inline-block;">
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