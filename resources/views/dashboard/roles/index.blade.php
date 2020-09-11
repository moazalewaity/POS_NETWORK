@extends('layouts.dashboard.app')
@section('title' , " الصلاحيات ")

@section('content')

<div class="row padd-30">
                <div class="col col-lg-12 col-sm-12 col-12">
                    <div class="table-st bg-w">
                        <div class="main-title">
                            <h3>  الصلاحيات    </h3>
                            <br/>

                                  <form action="">
                                  <div class="ml-auto">
                                  <div class=" col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="search" autofocus class="form-control" placeholder="search" value="{{ request()->search }}">
                                    </div>
                                </div>
                                </div>
                                  <button type="submit" class="m-btn btn btn-primary mr-2"><i class="fa fa-search"></i> بحث</button>
                                  @if (auth()->user()->hasPermission('create_roles'))
                                        <a href="{{ route('dashboard.roles.create') }}" class="m-btn btn btn-primary"><i class="fa fa-plus"></i> انشاء</a>
                                    @endif
                        </form>
                        </div>


                        @if ($roles->count() > 0)
                        <div class="table-responsive">
                            <table id="opened-Auctions" class="table table-striped table-bordered" style="width:100%">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>الصلاحيات</th>
                                    <th>عدد المستخدمين </th>
                                    <th>الاكشن</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($roles as $index=>$role)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach ($role->permissions as $permission)
                                                <h5 style="display: inline-block;"><span class="badge badge-primary">{{ $permission->name }}</span></h5>
                                            @endforeach
                                        </td>
                                        <td>{{ $role->users_count }}</td>
                                        <td>
                                            @if (auth()->user()->hasPermission('update_roles'))
                                                <a href="{{ route('dashboard.roles.edit', $role->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> تعديل</a>
                                            @endif
                                            @if (auth()->user()->hasPermission('delete_roles'))
                                                <form method="post" action="{{ route('dashboard.roles.destroy', $role->id) }}" style="display: inline-block;">
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

                            {{ $roles->appends(request()->query())->links() }}

                        @else
                            <h3 style="font-weight: 400;">لا توجد بيانات بعد !</h3>
                        @endif
                    </div>
                </div>
            </div><!-- end of tile -->
        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection