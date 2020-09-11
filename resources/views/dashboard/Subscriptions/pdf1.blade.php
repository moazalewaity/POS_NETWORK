@extends('layouts.dashboard.app')
@section('title' , " عرض الطلبات ")

@section('content')



<div class="upload-images-page">
        <div class="container-fluid">
            <div class="row justify-content-md-center ">
                <div class="col col-lg-10 col-sm-12 col-12 card" id="printJS-form">
                    <div class="row" id="myFrame">
                        <div class="col col-lg-12 col-sm-12 col-12">
                            <div class="main-title">
                                <h3> السيد/ة :  {{ $user->name }} </h3>

                                <h3 style="float:left">
                                كشف رقم  #
                                {{ rand() }}<br>
                                 وقت الانشاء  :{{$user->created_at}}  <br>
                                </h3>
                                <p class="text-center" style="font-size: 30px;color: black;"> 
                                Nour.Net شبكة 

                                </p>
                                <p >
                               الاسم :  {{ $user->name}} <br>
                               رقم الجوال:  {{ $user->phone}} <br>
                               البريد الالكترونى : {{ $user->email }}<br>
                              كشف حساب مفصل <br>
                                </p>
                                <br/>
                            </div>
                            <div class="add-form">

                          <div class="table-responsive">
                            <table id="opened-Auctions" class="table table-striped table-bsubscriptioned" style="width:100%">
                            <thead>
                    <tr class="heading">
                <td>
                    حالة الدفع 
                </td>
                <td>
                    نوع الاشتراك 
                </td>
                <td>
                    بداية الاشتراك 
                </td>
                <td>
                    نهاية الاشتراك 
                </td>
                <td>
                    شهر  الاشتراك 
                </td>

            </tr>
</thead>
<tbody>
                                @foreach ($user->subscriptions as $index=>$subscription)

                                <?php
                                    $total = 0;
                                ?>
                                    <tr class="item">
                                       
                                      
                                        <td>
                                           @if($subscription->status == 1) 
                                           <span class='t-status-o'>تم الدفع </span>
                                           @else
                                           <span class='t-status-c'>لم يدفع بعد </span>
                                           @endif
                                        </td>
                                        <td>{{ $subscription->catgory->name }}</td>
                                        <td>{{ $subscription->start_subscription->format('m/d/Y') }}</td>
                                        <td>
                                        {{ $subscription->end_subscription->format('m/d/Y') }}
                                        </td>
                                        <td>
                                            <span class="t-status-c">
                                                  {{ $subscription->month }} / {{ $subscription->year }}
                                                  {{-- /{{ $subscription->price }} --}}
                                                 </span>
                                        </td>
                                      
                                    </tr>

                                   
                                     <?php
                                       $total += (int)$subscription->price;
                                       ?>
                                         
                                    @endforeach

                                    

                                </tbody>

                                <!-- <tfooter>
                              <tr class="total">
                                    <td></td>
                                    
                                    <td>
                                    المجموع:  &nbsp;
                                    
                                    </td>
                                </tr>
                                </tfooter> -->
                                

                            </table>
                            </div>

                            <div class="main-btn-form">
                             <button type="button" class="btn btn-primary mb-2" onclick="window.print();"> طباعة </button>
                             <!-- <button type="button" class="btn btn-primary mb-2"> تنزيل  </button> -->
                            </div>

                           
                        </div><!-- // col -->
                    </div><!-- row 2 -->
                </div>

            </div><!-- // row -->
            
        </div><!-- // container -->
    </div>
               

@endsection