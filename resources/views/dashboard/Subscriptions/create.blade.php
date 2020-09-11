@extends('layouts.dashboard.app')
@section('title' , "انشاء  اشتراك جديد")

@section('content')

<div class="row justify-content-md-center  padd-30">
                <div class="col col-lg-10 col-sm-12 col-12 card">
                    <div class="table-st bg-w">
                        <div class="main-title">
                            <h3>انشاء  اشتراك جديد     </h3>
                            <div>
   

    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">

                <form method="post" action="{{ route('dashboard.subscriptions.store') }}">
                    @csrf
                    @method('post')

                    @include('dashboard.partials._errors')


                    <div class="form-group">
                        <label for="projectinput2"> المستخدم  </label>
                        <select name="user_id" class="form-control">
                            <optgroup label="من فضلك أختر المستخدم  ">
                                    @foreach($users as $user)
                                        <option
                                            value="{{$user -> id }}">
                                            {{$user -> name}}
                                        </option>

                                    @endforeach
                            </optgroup>
                        </select>
                        @error('user_id')
                        <span class="text-danger"> {{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                                                            <label for="projectinput2"> نوع الاشتراك  </label>
                                                            <select name="category_id" class="form-control">
                                                                <optgroup label="من فضلك أختر القسم ">
                                                                        @foreach($categories as $category)
                                                                            <option disabled
                                                                                value="{{$category -> id }}">
                                                                                {{$category -> name}}
                                                                            </option>
                                                                            @if ($category->children)
                                                                            @foreach ($category->children as $child)
                                                                            <option
                                                                                value="{{$child -> id }}">
                                                                                {{$child -> name}}
                                                                            </option>
                                                                            @endforeach
                                                                           @endif

                                                                        @endforeach
                                                                </optgroup>
                                                            </select>
                                                            @error('category_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>

                    <div class="form-group">
                        <label> بداية الاشتراك</label>
                        <input data-toggle="datepicker" type="text" placeholder=" 01 Jan 2020 " name="start_subscription" class="form-control" value="{{ old('start_subscription') }}">
                    </div>

                    <div class="form-group">
                        <label> نهاية الاشتراك</label>
                        <input data-toggle="datepicker" type="text" placeholder=" 01 Jan 2020 " name="end_subscription" value="{{ old('end_subscription') }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label> شهر الاشتراك </label>
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
                        <label>  الدفعة الحالية (الدفعة المستلمة من العميل )</label>
                        <input  type="number" placeholder="0" name="batch" value="{{ old('batch') }}" class="form-control"> شيكل
                    </div>


                    <div class="form-group">
                        <label>  حالة الدفع  </label>
                        <select name="status" class="form-control">
                          <option value="1"> تم الدفع  </option>
                          <option value="0"> لم يدفع   </option>
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