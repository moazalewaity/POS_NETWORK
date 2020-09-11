@extends('layouts.dashboard.app')
@section('title' , "انشاء صلاحية  جديدة")

@section('content')

<div class="row justify-content-md-center  padd-30">
                <div class="col col-lg-10 col-sm-12 col-12 card">
                    <div class="table-st bg-w">
                        <div class="main-title">
                            <h3> اضافة صلاحية جديدة    </h3>
                            <div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">

                <form method="post" action="{{ route('dashboard.roles.store') }}">
                    @csrf
                    @method('post')

                    @include('dashboard.partials._errors')

                    {{--name--}}
                    <div class="form-group">
                        <label>الاسم</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    {{--permissions--}}
                    <div class="form-group">
                        <h4>الصلاحيات</h4>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="width: 5%;">#</th>
                                <th style="width: 15%;">Model</th>
                                <th>Permissions</th>
                            </tr>
                            </thead>

                            <tbody>

                            @php
                                $models = ['categories', 'users', 'subscriptions' , 'cards' ,'settings'];
                            @endphp

                            @foreach ($models as $index=>$model)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td class="text-capitalize">{{ $model }}</td>
                                    <td>
                                        @php
                                            $permission_maps = ['create', 'read', 'update', 'delete'];
                                        @endphp

                                        @if ($model == 'settings')
                                            @php
                                                $permission_maps = ['create', 'read'];
                                            @endphp
                                        @endif

                                        <select name="permissions[]" class="form-control select2" multiple>
                                            @foreach ($permission_maps as $permission_map)
                                                <option value="{{ $permission_map . '_' . $model }}">{{ $permission_map }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                        <div class="form-group">
                        <button type="submit" class="btn btn-primary mr-5"><i class="fa fa-plus"></i> اضافة </button>
                        <a href="{{ route('dashboard.roles.index') }}" class="btn btn-danger">
                        <i class="fas fa-undo"></i>
                        رجوع 
                        </a>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->
        </div><!-- end of col -->
    </div><!-- end of row -->

@endsection