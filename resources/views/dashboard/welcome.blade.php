@extends('layouts.dashboard.app')
@section('title' , "الرئيسية")
@section('content')

<!-- statistics -->
<div class="statistics">
	<div class="container-fluid">
		<div class="row">
			<div class="col col-lg-3 col-sm-6 col-12">
				<!-- Statistic Card -->
				<div class="s-card">
					<div class="s-card-img">
						<img src="{{ asset('dashboard_files/img/statistics/img-1.png') }}" alt="">
					</div>
					<div class="s-card-info">
						<h5> المستخدمين </h5>
						<p class="vio-c"> {{ $users_count }} مستخدم  </p>
					</div>
				</div>
				<!-- // Statistic Card -->
				</div><!-- // col -->
				<div class="col col-lg-3 col-sm-6 col-12">
					<!-- Statistic Card -->
					<div class="s-card">
						<div class="s-card-img">
							<img src="{{ asset('dashboard_files/img/statistics/img-2.png') }}" alt="">
						</div>
						<div class="s-card-info">
							<h5> الاقسام  </h5>
							<p class="bl1-c"> {{ $categories_count }} قسم  </p>
						</div>
					</div>
					<!-- // Statistic Card -->
					</div><!-- // col -->
					<div class="col col-lg-3 col-sm-6 col-12">
						<!-- Statistic Card -->
						<div class="s-card">
							<div class="s-card-img">
								<img src="{{ asset('dashboard_files/img/statistics/img-3.png') }}" alt="">
							</div>
							<div class="s-card-info">
								<h5> الاشتراكات </h5>
								<p class="bl2-c"> {{ $subscriptions_count }} اشترك</p>
							</div>
						</div>
						<!-- // Statistic Card -->
						</div><!-- // col -->
						<div class="col col-lg-3 col-sm-6 col-12">
							<!-- Statistic Card -->
							<div class="s-card">
								<div class="s-card-img">
									<img src="{{ asset('dashboard_files/img/statistics/img-4.png') }}" alt="">
								</div>
								<div class="s-card-info">
									<h5> نقاط البيع  </h5>
									<p class="yell-c"> {{ $pos_count }} نقاط </p>
								</div>
							</div>
							<!-- // Statistic Card -->
							</div><!-- // col -->
							</div><!-- // row -->
							</div><!-- // container -->
						</div>
						
						<div class="row padd-30">
							<div class="col col-lg-6 col-sm-12 col-6">
								<div class="table-st bg-w">
									<div class="main-title">
										<h3> الاشتراكات الغير المدفوعة </h3>
									</div>
									@if ($subscriptions->count() > 0)
									<div class="table-responsive">
										<table id="opened-Auctions" class="table table-striped table-bsubscriptioned" style="width:100%">
											<thead>
												<tr>
													<th>#</th>
													<th>الاسم</th>
													<th>نوع الاشتراك </th>
													<th>  شهر الاشتراك  </th>
													<th>  حالة الدفع   </th>
												</tr>
											</thead>
											<tbody>
												@foreach ($subscriptions as $index=>$subscription)
												<tr>
													<td>{{ $index+1 }}</td>
													<td>{{ $subscription->user['name'] }}</td>
													<td>
                                                        {{ $subscription->catgory->name }}
                                                        /
                                                        {{ $subscription->catgory->parent->name }} 
                                                    </td>
													<td>
														<span class="t-status-c">
															{{ $subscription->month }} / {{ $subscription->year }}
														</span>
													</td>
													<td>
														@if($subscription->status == 0)
														<span class='t-status-c'>لم يدفع بعد </span>
														@endif
													</td>
													
												</tr>
												@endforeach
											</tbody>
										</table>
										@else
										<h3 style="font-weight: 400;">لا توجد بيانات بعد </h3>
										@endif
									</div>
								</div>
                            </div>
							
                       

                            


                                <div class="col col-lg-6 col-sm-12 col-6">
                                    <div class="table-st bg-w">
                                        <div class="main-title">
                                            <h3> الاشتراكات   المنتهية </h3>
                                        </div>
                                        @if ($subscriptions1->count() > 0)
                                        <div class="table-responsive">
                                            <table id="opened-Auctions" class="table table-striped table-bsubscriptioned" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>الاسم</th>
                                                        <th>نوع الاشتراك </th>
                                                        <th> تاريخ انتهاء الاشتراك </th>
                                                        <th>  حالة الاشتراك   </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($subscriptions1 as $index=>$subscription)
                                                    <tr>
                                                        <td>{{ $index+1 }}</td>
                                                        <td>{{ $subscription->user['name'] }}</td>
                                                        <td>
                                                            {{ $subscription->catgory->name }} 
                                                            /
                                                            {{ $subscription->catgory->parent->name }} 
                                                        </td>
                                                        <td>
                                                            <span class="t-status-c">
                                                                {{ $subscription->end_subscription->format('m/d/Y') }} 
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class='t-status-c'> الاشتراك منتهى </span>
                                                        </td>
                                                        
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @else
                                            <h3 style="font-weight: 400;">جميع الاشتراكات مفعلة  </h3>
                                            @endif
                                        </div>
                                    </div>
                                </div>
							</div>
							

							<div class="row padd-30">
							<div class="col col-lg-6 col-sm-12 col-6">
								<div class="table-st bg-w">
									<div class="main-title">
										<h3> نقاط البيع النشطة </h3>
									</div>
									@if ($pos->count() > 0)
                          <div class="table-responsive">
                            <table id="opened-Auctions" class="table table-striped table-bsubscriptioned" style="width:100%">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>النوع </th>
                                    <th> المكان</th>
                                    <th>  حالة نقطة البيع    </th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($pos as $index=>$item)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->place }}</td>
                                        <td>
                                           @if($item->status == 1) 
                                           <span class='t-status-o'>نشطة  </span>
                                           @else
                                           <span class='t-status-c'>غير نشطة </span>
                                           @endif
                                        </td>
                                       
                                    </tr>
                                @endforeach

                                </tbody>
                                

                            </table>
                           


                        @else
                            <h3 style="font-weight: 400;">لا توجد بيانات بعد </h3>
                        @endif
									</div>
								</div>
                            </div>
							

@endsection