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
                <form method="Post" action="{{ route('dashboard.cards.update', $card->id) }}">
                    @csrf
                    @method('put')

                    @include('dashboard.partials._errors')

                    
                    
                    <input type="hidden" name="pos_id" value="{{ $card->pos_id }}" />

                    <div class="form-group">
                        <label> الدفع    </label>
                        <select name="type_paid" class="form-control">
                          <option value="1"  @if($card->type_paid == 1  )  selected @endif> دفع مسبق  </option>
                          <option value="0"  @if($card->type_paid == 0  )  selected @endif>  دفع موجل  </option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label> الكمية  </label>
                        <input  type="number" placeholder="الكمية " name="quantity" class="form-control" value="{{ $card->quantity }}">
                    </div>

                    <div class="form-group">
                        <label> الدفعة  </label>
                        <input  type="text" placeholder="الدفعة "  name="price" value="{{ $card->price }}" class="form-control"> شيكل 
                    </div>

                    <div class="form-group">
                        <label> الدفعة المستلمة   </label>
                        <input  type="text" placeholder="الدفعة "  name="price_paid" value="{{ $card->price_paid }}" class="form-control"> شيكل 
                    </div>

                    <div class="form-group">
                        <label> الشهر   </label>
                        <select name="month" class="form-control">
                        @php
                                $months = [1,2,3,4,5,6,7,8,9,10,11,12];
                            @endphp

                            @foreach ($months as $index=>$month)
                        <option
                        @if($card->month == $month )  selected @endif
                         value="{{ $month}}"> 
                        {{ $month }} 
                        </option>
                            @endforeach
                        </select>
                    </div>


                    

                    <div class="form-group">
                        <label>  الحالة  </label>
                        <select name="status" class="form-control">
                          <option value="1" @if($card->status == 1  )  selected @endif> نشطة  </option>
                          <option value="0" @if($card->status == 0  )  selected @endif> غير نشطة  </option>
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