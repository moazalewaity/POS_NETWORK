@extends('layouts.dashboard.app')
@section('title' , "تعديل بيانات  مستخدم ")

@section('content')
<div class="row justify-content-md-center  padd-30">
                <div class="col col-lg-10 col-sm-12 col-12 card">
                    <div class="table-st bg-w">
                        <div class="main-title">
                            <h3>تعديل بيانات  مستخدم      </h3>
                            <div>


                            <div class="row">
        <div class="col-md-12">

                <form method="post" action="{{ route('dashboard.users.update', $user->id) }}">
                    @csrf
                    @method('put')

                    @include('dashboard.partials._errors')

                    {{--name--}}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                    </div>

                    {{--email--}}
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
                    </div>

                    <div class="form-group">
                        <label> رقم الجوال </label>
                        <input type="text"  name="phone" class="form-control" value="{{ old('email', $user->phone) }}">
                    </div>

                    {{--roles--}}
                    <div class="form-group">
                        <label>Roles</label>
                        <select name="role_id" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection