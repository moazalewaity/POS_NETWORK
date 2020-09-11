@extends('layouts.dashboard.app')
@section('title' , "تعديل بيانات الصلاحيات")

@section('content')

<div class="row justify-content-md-center  padd-30">
                <div class="col col-lg-10 col-sm-12 col-12 card">
                    <div class="table-st bg-w">
                        <div class="main-title">
                            <h3> تعديل صلاحية : {{ $role->name }}   </h3>
                            <div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile shadow mb-4">

                <form method="post" action="{{ route('dashboard.roles.update', $role->id) }}">
                    @csrf
                    @method('put')

                    @include('dashboard.partials._errors')

                    {{--name--}}
                    <div class="form-group">
                        <label>الاسم</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $role->name) }}">
                    </div>

                    {{--permissions--}}
                    <div class="form-group">
                        <h4>الصلاحيات </h4>
                        @php
                            $models = ['categories', 'users', 'subscriptions' , 'cards' , 'settings'];
                        @endphp

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="width: 5%;">#</th>
                                <th style="width: 15%;">Model</th>
                                <th>action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($models as $index=>$model)
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $model }}</td>
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
                                                <option {{ $role->hasPermission($permission_map . '_' . $model) ? 'selected' : '' }} value="{{ $permission_map . '_' . $model }}">{{ $permission_map }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table><!-- end of table -->
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> تعديل</button>
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