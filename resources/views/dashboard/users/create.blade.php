@extends('layouts.dashboard.app')
@section('title' , "انشاء مستخدم جديد")

@section('content')
<div class="row justify-content-md-center  padd-30">
                <div class="col col-lg-10 col-sm-12 col-12 card">
                    <div class="table-st bg-w">
                        <div class="main-title">
                            <h3>انشاء مستخدم جديد     </h3>
                            <div>
   

    <div class="row">
        <div class="col-md-12">

                <form method="post" action="{{ route('dashboard.users.store') }}">
                    @csrf
                    @method('post')

                    @include('dashboard.partials._errors')

                    {{--name--}}
                    <div class="form-group">
                        <label>الاسم
                            :
                            <span class="text-danger">هذا الحقل اجبارى</span>

                        </label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    {{--email--}}
                    <div class="form-group">
                        <label>البريد الالكترونى</label>
                        <input type="email"  name="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    {{--phone--}}
                    <div class="form-group">
                        <label> رقم الجوال </label>
                        <input type="text"  name="phone" class="form-control" value="{{ old('phone') }}">
                    </div>

                    

                    {{--password--}}
                    <!-- <div class="form-group">
                        <label>كلمة المرور</label>
                        <input type="password" name="password" class="form-control">
                    </div> -->

                    {{--password confirmation--}}
                    <!-- <div class="form-group">
                        <label>تاكيد كلمة المرور</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div> -->

                    {{--roles--}}
                    <!-- <div class="form-group">
                        <label>الصلاحية </label>
                        <select name="role_id" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('dashboard.roles.create') }}">Create new role</a>
                    </div> -->

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> اضافة</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->
        </div><!-- end of col -->
    </div><!-- end of row -->

@endsection