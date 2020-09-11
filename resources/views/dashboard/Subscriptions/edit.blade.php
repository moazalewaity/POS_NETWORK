@extends('layouts.dashboard.app')
@section('title' , "تعديل بيانات  الاشتراك ")

@section('content')
<div class="row justify-content-md-center  padd-30">
                <div class="col col-lg-10 col-sm-12 col-12 card">
                <div class="table-st bg-w">
                        <div class="main-title">
                            <h3>تعديل  الاشتراك      </h3>
                            <div>

  <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">

                <form method="post" action="{{ route('dashboard.subscriptions.update', $Subscription->id) }}">
                    @csrf
                    @method('put')

                    @include('dashboard.partials._errors')

                    
                    <div class="form-group">
                        <label for="projectinput2"> المستخدم  </label>
                        <select name="user_id" class="form-control">
                            <optgroup label="من فضلك أختر المستخدم  ">
                                    @foreach($users as $user)
                                        <option
                                        @if($Subscription->user_id == $user->id  )  selected @endif
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
                                                                            @if($child->id == $Subscription->category_id  )  selected @endif
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
                        <input data-toggle="datepicker" type="text" placeholder=" 01 Jan 2020 " name="start_subscription" class="form-control" value="{{ $Subscription->start_subscription }}">
                    </div>

                    <div class="form-group">
                        <label> نهاية الاشتراك</label>
                        <input data-toggle="datepicker" type="text" placeholder=" 01 Jan 2020 " name="end_subscription" value="{{ $Subscription->end_subscription }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label> شهر الاشتراك </label>
                        <select name="month" class="form-control">
                        @php
                                $months = [1,2,3,4,5,6,7,8,9,10,11,12];
                            @endphp

                            @foreach ($months as $index=>$month)
                        <option
                        @if($Subscription->month == $month  )  selected @endif
                         value="{{ $month}}">
                             {{ $month}} 
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>  الدفعة الحالية (الدفعة المستلمة من العميل )</label>
                        <input  type="number" placeholder="0" name="batch" value="{{ $Subscription->batch }}" class="form-control"> شيكل
                    </div>


                    <div class="form-group">
                        <label>  حالة الدفع  </label>
                        <select name="status" class="form-control">
                          <option value="1" @if($Subscription->status == 1  )  selected @endif> تم الدفع  </option>
                          <option value="0" @if($Subscription->status == 0  )  selected @endif> لم يدفع   </option>
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