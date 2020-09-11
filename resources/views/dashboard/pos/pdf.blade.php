
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>كشف سجل </title>
    
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600&display=swap" rel="stylesheet">


    <style>
    * , html , body{
        font-family: 'Cairo', sans-serif;
        font-weight:bold;
    }
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body style="margin-top: 60px;">
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                             Nour.Net شبكة
                                <!-- <img src="https://www.sparksuite.com/images/logo.png" style="width:100%; max-width:300px;"> -->
                            </td>
                            
                            <td style="position: absolute;
    top: 92px;
    left: 844px;">
                                كشف رقم  #
                                {{ rand() }}<br>
                               {{$user->created_at}}  :  وقت الانشاء <br>
                                <!-- Due: February 1, 2015 -->
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information" align="rtl">
                <td colspan="2">
                    <table>
                        <tr>
                            <!-- <td>
                                Sparksuite, Inc.<br>
                                12345 Sunny Road<br>
                                Sunnyville, CA 12345
                            </td> -->
                            
                            <td align="center" style="float: right;">
                               {{ $user->name}} <br>
                               {{ $user->email }}<br>
                              كشف حساب مفصل <br>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            
            
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
            
          
            
            <tr class="total">
                <td></td>
                
                <td>
                المجموع:  &nbsp;
                  {{-- $385.00 --}}
                  {{ $total }}
                
                </td>
            </tr>
           
        </table>
    </div>
</body>
</html>
