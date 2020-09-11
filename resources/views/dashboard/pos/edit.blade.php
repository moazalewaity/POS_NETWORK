@extends('layouts.dashboard.app')
@section('title' , "تعديل بيانات  نقطة البيع ")

@section('content')
<div class="row justify-content-md-center  padd-30">
                <div class="col col-lg-10 col-sm-12 col-12 card">
                <div class="table-st bg-w">
                        <div class="main-title">
                            <h3>تعديل  نقطة البيع      </h3>
                            <div>

  <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">
                <form method="Post" action="{{ route('dashboard.pos.update', $Pos->id) }}">
                    @csrf
                    @method('put')

                    @include('dashboard.partials._errors')

                    
                    

                    <div class="form-group">
                        <label> الاسم </label>
                        <input  type="text" placeholder="الاسم " name="name" class="form-control" value="{{ $Pos->name }}">
                    </div>

                    <div class="form-group">
                        <label> رقم الجوال </label>
                        <input  type="text" placeholder="05000000" name="phone" class="form-control" value="{{ $Pos->phone }}">
                    </div>

                    <div class="form-group">
                        <label>  نوع نقطة البيع </label>
                        <input  type="text" placeholder="سوبر ماركت - محل "  name="type" value="{{ $Pos->type }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label> المكان </label>
                        <input  type="text" placeholder="المكان "  name="place" value="{{ $Pos->place }}" class="form-control">

                    </div>


                    <div class="form-group">
                        <label>  حالة الدفع  </label>
                        <select name="status" class="form-control">
                          <option value="1" @if($Pos->status == 1  )  selected @endif> نشطة  </option>
                          <option value="0" @if($Pos->status == 0  )  selected @endif> غير نشطة  </option>
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