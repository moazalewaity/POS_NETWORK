@extends('layouts.dashboard.app')
@section('title' , "  تعديل بيانات القسم ")

@section('content')


<div class="row justify-content-md-center  padd-30">
                <div class="col col-lg-10 col-sm-12 col-12 card">
                    <div class="table-st bg-w">
                        <div class="main-title">
                            <h3> تعديل فسم  -{{ $category->name }}    </h3>

    <div class="row">

        <div class="col-md-12">

            <div class="tile mb-4">

                <form method="post" action="{{ route('dashboard.categories.update', $category->id) }}">
                    @csrf
                    @method('put')

                    @include('dashboard.partials._errors')


                    @if ($category->parent_id )
                                                        <div class="form-group">
                                                            <label for="projectinput2"> أختر القسم </label>
                                                            <select name="parent_id" class="select2 form-control">
                                                                <optgroup label="من فضلك أختر القسم ">
                                                                    @if($categories && $categories -> count() > 0)
                                                                        @foreach($categories as $main_category)
                                                                            <option
                                                                                value="{{$main_category -> id }}"
                                                                                @if($category->parent_id == $main_category -> id  )  selected @endif
                                                                            >{{$main_category -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('parent_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                               
                                                     @endif

                    <div class="form-group">
                        <label>الاسم</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> تعديل</button>
                        <a href="{{ route('dashboard.categories.index') }}" class="btn btn-danger">
                        <i class="fas fa-undo"></i>
                        رجوع 
                        </a>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection