@extends('layouts.dashboard.app')
@section('title' , "انشاء دفعة جديد")

@section('content')

<div class="row justify-content-md-center  padd-30">
                <div class="col col-lg-10 col-sm-12 col-12 card">
                    <div class="table-st bg-w">
                        <div class="main-title">
                            <h3>انشاء  دفعة  جديد     </h3>
                            <div>
   

    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">

                <form method="post" action="{{ route('dashboard.cards.store') }}">
                    @csrf
                    @method('post')

                    @include('dashboard.partials._errors')

                      
                      <input type="hidden" name="pos_id" value="{{ \Request::get('pos_id') }}" />
                    <div class="form-group">
                        <label> الدفع    </label>
                        <select name="type_paid" class="form-control">
                          <option value="1"> دفع مسبق  </option>
                          <option value="0">  دفع موجل  </option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label> الكمية  </label>
                        <input  type="number" placeholder="الكمية " name="quantity" class="form-control" value="{{ old('quantity') }}">
                    </div>

                    <div class="form-group">
                        <label> الدفعة  </label>
                        <input  type="text" placeholder="الدفعة "  name="price" value="{{ old('price') }}" class="form-control"> شيكل 
                    </div>

                    <div class="form-group">
                        <label> الدفعة المستلمة   </label>
                        <input  type="text" placeholder="الدفعة "  name="price_paid" value="{{ old('price_paid') }}" class="form-control"> شيكل 
                    </div>

                    <div class="form-group">
                        <label> الشهر   </label>
                        <select name="month" class="form-control">
                        @php
                                $months = [1,2,3,4,5,6,7,8,9,10,11,12];
                            @endphp

                            @foreach ($months as $index=>$month)
                        <option
                        @if($months == str_replace('0' , '', date('m'))) )  selected @endif
                         value="{{ $month}}"> 
                        {{ $month }} 
                        </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label> الحالة   </label>
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