@extends('layouts.dashboard.app')
@section('title' , "انشاء  نقطة بيع جديد")

@section('content')

<div class="row justify-content-md-center  padd-30">
                <div class="col col-lg-10 col-sm-12 col-12 card">
                    <div class="table-st bg-w">
                        <div class="main-title">
                            <h3>انشاء  نقطة بيع جديد     </h3>
                            <div>
   

    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">

                <form method="post" action="{{ route('dashboard.pos.store') }}">
                    @csrf
                    @method('post')

                    @include('dashboard.partials._errors')


                    


                    <div class="form-group">
                        <label> الاسم </label>
                        <input  type="text" placeholder="الاسم " name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label> رقم الجوال </label>
                        <input  type="text" placeholder="05000000" name="phone" class="form-control" value="{{ old('phone') }}">
                    </div>

                    <div class="form-group">
                        <label>  نوع نقطة البيع </label>
                        <input  type="text" placeholder="سوبر ماركت - محل "  name="type" value="{{ old('type') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label> المكان </label>
                        <input  type="text" placeholder="المكان "  name="place" value="{{ old('place') }}" class="form-control">

                    </div>


                    <div class="form-group">
                        <label>  حالة نقطة البيع   </label>
                        <select name="status" class="form-control">
                          <option value="1"> نشطة  </option>
                          <option value="0"> غير نشطة  </option>
                        </select>
                    </div>

                  
                   

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> اضافة</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->
        </div><!-- end of col -->
    </div><!-- end of row -->

@endsection