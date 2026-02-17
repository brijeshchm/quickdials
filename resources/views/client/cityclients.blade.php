@extends('client.layouts.app')
@section('title')
Quick Dials | A Local Search Engine for Businesses in {{Request::segment(1)}}
@endsection 
@section('keyword') 
Find Best It Training Centre near in {{Request::segment(1)}}, Find Best It Training Institute near in {{Request::segment(1)}}, Find Top 10 IT Training Institute near in {{Request::segment(1)}}, Find Best Entrance Exam Preparation Centre Near in {{Request::segment(1)}}, Top 10 Entrance Exam Centre Near in {{Request::segment(1)}}, Find Best Distance Education Centre Near in {{Request::segment(1)}}, Find Top 10 Distance Education Centre Near in {{Request::segment(1)}}, Find Best School And Colleges Near in {{Request::segment(1)}}, Find Top 10 school And College Near in {{Request::segment(1)}}, Get Education Loan, GET Free career Counselling, Find Best overseas education consultants Near in {{Request::segment(1)}}, Find Top 10 overseas education consultants Near in {{Request::segment(1)}}
@endsection
@section('description') 
Find Only Certified Training Institutes in {{Request::segment(1)}}, Coaching Centers near in {{Request::segment(1)}} on QuickDials and Get Free counseling, Free Demo Classes, and Get Placement Assistence in {{Request::segment(1)}}.
@endsection
@section('content')	

    <div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 third-add-section">

				<?php  

						if (!empty($clientBanner->child_banner)) {
		$cicons = unserialize($clientBanner->child_banner);
		if (!empty($cicons)) {
						?>

				<img loading="lazy" src="{{asset($cicons['child_banner']['src'])}}" alt="{{ $cicons['child_banner']['name'] }}">

				<?php  } else { ?>

				<img loading="lazy" src="<?php echo asset('client/images/computer-courses-training.jpg'); ?>"
					alt="computer-courses-training">
				<?php  }
	} else {

		if (!empty($clientBanner->category_banner)) {
			$cicons = unserialize($clientBanner->category_banner);
			if ($cicons) {
						?>

				<img loading="lazy" src="{{asset($cicons['category_banner']['src'])}}" alt="{{$cicons['category_banner']['name']}}">


				<?php  }
		} else {  ?>
				<img loading="lazy" src="<?php echo asset('client/images/computer-courses-training.jpg'); ?>"
					alt="computer-courses-training">

				<?php }
	} ?>

			</div>
		</div>
	</div>

<div class="container">

		<div class="col-sm-9 col-md-9 reviews-box-main mainContainer">
		 <!-- #region -->

		 
			@if ($cityclients->isNotEmpty()) 
				<?php			

						$n = 0;?>
				@foreach($cityclients as $client)

					<div class="col-sm-12 col-md-12 reviews-box-1 line-content">
						<div class="client-list-first">
							<div class="col-sm-4 col-md-4 serchlist-img "><a
									href="{{ url('business-details') . "/" . $client->business_slug }}"
									title="{{$client->business_name }}">
									<?php if (null != $client->logo) {
							$profilePic = unserialize($client->logo);
										?><img loading="lazy" src="<?php echo asset('' . $profilePic['large']['src']); ?>" alt="{{$client->business_name}}"
										title="{{$client->business_name}}" height="141" /><?php
						} else {
										?><img loading="lazy" src="<?php echo asset('client/images/default_pp_small.png'); ?>" alt="Business Logo"
										title="Business Logo" height="141" style="width:100%" /><?php
						}
									?>
									@if($client->client_type != 'FreeListing')
										<p><a href="#"><i class="fa fa-fw fa fa-thumbs-up icon" aria-hidden="true"></i></a></p>
									@endif
								</a>

							</div>
							<div class="col-sm-6 col-md-6 aboutcomp">
								@if($client->certified_status)
									<div class="client-trusted">
										@if($client->certified_status)
											<img loading="lazy" src="{{ asset('img/q_verified.gif')}}">
										@endif
										@if($client->trusted_status)
											<img loading="lazy" src="{{ asset('img/q_trust.gif')}}">
										@endif
										@if($client->gst_status)
											<img loading="lazy" src="{{ asset('img/q_gst.gif')}}">
										@endif
									</div>
								@endif
								<div class="serchlist-txt">
									<a href="{{ url('business-details') . "/" . $client->business_slug }}"
										title="{{$client->business_name }}">
										<span class="serchlist-txt-1">
											<i class="fa fa-fw fa-university icon" aria-hidden="true"></i>
											<?php echo ucfirst(strtolower(substr($client->business_name, 0, 28)));?>
										</span>
										<?php
						$badge = $client->sold_on_position;
										?>


									</a>
									<!-- <img loading="lazy" src="<?php echo asset('client/images/preferred.png'); ?>" alt="preferred" > -->
								</div>

								<div class="certified" <?php if ($client->certified_status == '1') { ?>
									style="background-image: url(../client/images/certified-icon.png);" <?php } ?>>

									<?php
						$arr = [];
						if (!empty($client->address)) {
							$arr['address'] = $client->address;
						}
						if (!empty($client->landmark)) {
							$arr['landmark'] = $client->landmark;
						}
						if (!empty($client->city)) {
							$arr['city'] = $client->city;
						}
						if (!empty($client->state)) {
							$arr['state'] = $client->state;
						}
						if (!empty($client->country)) {
							$arr['country'] = $client->country;
						}
						$addr = getAddress($arr, 30);
						if ($addr->ispositiveresponse) {
										?>
									<div class="serchlist-txt">
										<i class="fa fa-fw fa fa-street-view icon" aria-hidden="true"></i>
										<?php if ($addr->issubstr): ?>
										<a
											href="{{ url('business-details') . "/" . $client->business_slug }}">{{ ucfirst(strtolower($addr->substr)) }}</a>
										<a href="#" data-toggle="tooltip" data-placement="bottom"
											title="{{ $addr->fullstr }}">more</a>
										<?php else: ?>
										<a
											href="{{ url('business-details') . "/" . $client->business_slug }}">{{ ucfirst(strtolower($addr->substr)) }}</a>
										<?php endif; ?>
									</div>
									<?php						
										}
									?>

									@if(!empty($client->time))
												<div class="serchlist-txt">

													<i class="fa fa-fw fa-clock-o serchlist-icon" aria-hidden="true"></i>
													<a href="{{ url('business-details') . "/" . $client->business_slug }}"
														title="{{$client->business_name }}"><span class="serchlist-txt">
															<?php
										if (!empty($client->time)) {
											$times = json_decode($client->time);
											$today = strtolower(date('l'));
											echo "Opening Hrs (" . $times->$today->from . " - " . $times->$today->to . ")";
										} else {
											echo "No working hours available";
										}
													?>
														</span></a>
												</div>
									@endif

									<div class="serchlist-txt">
										<i class="fa fa-fw fa fa-cog icon" aria-hidden="true"></i>
										<span class="serchlist-txt">
											<div class="col-md-12 service-text">
												<ul>
													<?php

						$assignedKwds = DB::table('assigned_kwds')
							->join('keyword', 'keyword.id', '=', 'assigned_kwds.kw_id')
							->join('child_category', 'child_category.id', '=', 'assigned_kwds.child_cat_id')
							->select('keyword.keyword')
							->where('assigned_kwds.client_id', '=', $client->client_id)
							->limit(2)
							->get();
						$firstHalf = [];
						$secondHalf = [];
						$i = 1;
						$inPopupArr = [];
						foreach ($assignedKwds as $assignedKwd) {										 
											?>

													<li>
														<a href="<?php echo generate_slug($assignedKwd->keyword) ?>"
															title="{{$assignedKwd->keyword}}"
															class="keystore"><?php echo $assignedKwd->keyword; ?></a>
													</li>
													<?php  }  ?>
												</ul>
											</div>


										</span>
									</div>
								</div>

								<div class="serchlist-txt-btn"><a href="javascript:void(0);" title="{{$client->business_name }}"
										class="sms-view common_popup_form"><span>Enquiry Now</span></a>&nbsp;&nbsp;&nbsp;<a
										href="https://wa.me/917559435943" title="{{$client->business_name }}" class="whatsapp-view"
										target="_blank" rel="noopener noreferrer"><span><i class="fa fa-whatsapp"></i>
											WhatsApp</span></a> &nbsp;&nbsp;&nbsp;<a
										href="{{ url('business-details') . "/" . $client->business_slug }}"
										title="{{$client->business_name }}" class="sms-view"><span>Vew Details</span></a></div>


							</div>
						</div>
						<div class="client-list-second">
							<div class="col-sm-2 col-md-2 btnBox">
								<a href="{{ url('business-details') . "/" . $client->business_slug }}"><span
										class="serchlist-txt-1">User Rating</span></a>
								<div class="serchlist-txt">
									<?php							 
											if ($client->comment_count > 0) {
							$avgRating = ($client->rating / (5 * $client->comment_count)) * 5;

							$avgRating = number_format($avgRating, 1, '.', '');

							$whole = floor($avgRating);
							$fraction = $avgRating - $whole;
							$remain = 5 - $whole;
							for ($i = 0; $i < $whole; ++$i) {

								echo "<a href='" . url('business-details') . "/" . $client->business_slug . "' class='emptystar fullstar'></a>";
							}
							if ($fraction > 0 && $fraction < 1) {

								echo "<a href='" . url('business-details') . "/" . $client->business_slug . "' class='emptystar halfstar'></a>";
								--$remain;
							}
							for ($i = 0; $i < $remain; ++$i) {

								echo "<a href='" . url('business-details') . "/" . $client->business_slug . "' class='emptystar'></a>";
							}
						} else {
							$avgRating = 0.0;
							for ($i = 0; $i < 5; ++$i) {

								echo "<a href='" . url('business-details') . "/" . $client->business_slug . "' class='emptystar'></a>";
							}
						}


										?>

									<a href="{{ url('business-details/' . $client->business_slug) }}">
										<span class="serchlist-rating">
											({{ $avgRating ?? 0 }} Rating out of {{ $client->comment_count ?? 0 }} Votes)
										</span>
									</a>
								</div>
								<button class="common_popup_form enquiry-now" title="Best Offer {{$client->business_name }}">Enquiry Now</button>
							</div>
							<div class="col-sm-12 col-md-12" style="padding-left:0;">
								<div class="clickBlick"><a
										href="{{ url('business-details') . '/' . $client->business_slug . '/#rewandrate' }}"
										title="{{$client->business_name }}"><i class="fa fa-fw fa fa-sun-o"
											aria-hidden="true"></i></a><a
										href="{{ url('business-details') . '/' . $client->business_slug . '' }}"
										title="{{$client->business_name }}"><span>Click here to view your friend rating</span></a>

								</div>


							</div>

						</div>
					</div>
				@endforeach
				<a href="#top" id="top"></a>
				<ul id="pagin"></ul>
			 
			@endif
			<style>
				.current .btn-info {
					color: green;
				}

				#pagin li {
					display: inline-block;
					padding: 6px;
					margin: 5px;
					background-color: #C94A30;
				}

				#pagin li a {
					color: #fff;
				}
			</style>
				
			<script>

				//Pagination
				pageSize = 50;
				var pageCount = $(".line-content").length / pageSize;

				for (var i = 0; i < pageCount; i++) {

					$("#pagin").append('<li><a href="#top">' + (i + 1) + '</a></li> ');
				}
				$("#pagin li").first().find("a").addClass("current")
				showPage = function (page) {
					$(".line-content").hide();
					$(".line-content").each(function (n) {
						if (n >= pageSize * (page - 1) && n < pageSize * page)
							$(this).show();
					});
				}

				showPage(1);

				$("#pagin li a").click(function () {
					$("#pagin li a").removeClass("current btn btn-info");
					$(this).addClass("current btn btn-info");
					showPage(parseInt($(this).text()))
				});
			</script>


			@if(!empty($onlyClients))
				@foreach($onlyClients as $client)
					<div class="col-sm-12 col-md-12 reviews-box-1">
						<div class="col-sm-4 col-md-4 serchlist-img "><a
								href="{{ url('business-details') . "/" . $client->business_slug }}" title="{{$client->business_name }}">
								<?php if (!empty($client->logo)) {
							$profilePic = unserialize($client->logo);
										?><img loading="lazy" src="<?php echo asset($profilePic['large']['src']); ?>" alt="Logo" height="141" /><?php
						} else {
										?><img loading="lazy" src="<?php echo asset('client/images/default_pp_small.jpg'); ?>" alt="Logo" height="141"
									style="width:100%" /><?php
						}
									?>
								@if($client->client_type != 'FreeListing')
									<p><a href="javascript:void(0)"><i class="fa fa-fw fa fa-thumbs-up serchlist-location-icon"
												aria-hidden="true"></i></a></p>
								@endif
							</a>
						</div>
						<div class="col-sm-5 col-md-5 aboutcomp">


							<a href="{{ url('business-details') . "/" . $client->business_slug }}" title="{{$client->business_name }}">
								<span class="serchlist-txt-1">
									<i class="fa fa-fw fa-university serchlist-icon" aria-hidden="true"></i>
									<?php echo ucfirst(substr($client->business_name, 0, 28));?>
								</span>
								<!-- 						 
										<img loading="lazy" src="<?php echo asset('client/images/preferred.png'); ?>" alt="preferred"> -->

							</a>

							<div class="certified" <?php if ($client->certified_status == 1) { ?>
								style="background-image: url(../client/images/certified-icon.png);" <?php } ?>>

								<?php
						$arr = [];
						if (!empty($client->address)) {
							$arr['address'] = $client->address;
						}
						if (!empty($client->landmark)) {
							$arr['landmark'] = $client->landmark;
						}
						if (!empty($client->city)) {
							$arr['city'] = $client->city;
						}
						if (!empty($client->state)) {
							$arr['state'] = $client->state;
						}
						if (!empty($client->country)) {
							$arr['country'] = $client->country;
						}
						$addr = getAddress($arr, 30);
						if ($addr->ispositiveresponse) {
										?>
								<div class="serchlist-txt">
									<i class="fa fa-fw fa fa-street-view icon" aria-hidden="true"></i>
									<?php if ($addr->issubstr): ?>
									<a href="{{ url('business-details') . "/" . $client->business_slug }}">{{ $addr->substr }}</a>
									<a href="#" data-toggle="tooltip" data-placement="bottom" title="{{ $addr->fullstr }}">more</a>
									<?php else: ?>
									<a href="{{ url('business-details') . "/" . $client->business_slug }}">{{ $addr->substr }}</a>
									<?php endif; ?>
								</div>
								<?php
						}
									?>


								<div class="serchlist-txt"><i class="fa fa-fw fa-clock-o serchlist-icon" aria-hidden="true"></i>
									<a href="{{ url('business-details') . "/" . $client->business_slug }}"
										title="{{$client->business_name }}"><span class="serchlist-txt">
											<?php
						if (!empty($client->time)) {
							$times = json_decode($client->time);
							$today = strtolower(date('l'));
							echo "Opening Hrs (Today " . $times->$today->from . " - " . $times->$today->to . ")";
						} else {
							echo "No working hours available";
						}
										?>
										</span></a>
								</div>
								<div class="serchlist-txt">
									<i class="fa fa-fw fa fa-cog serchlist-icon" aria-hidden="true"></i>
									<span class="serchlist-txt">
										<div class="col-md-12 service-text">
											<ul>
												<?php

						$assignedKwds = DB::table('assigned_kwds')
							->join('keyword', 'keyword.id', '=', 'assigned_kwds.kw_id')
							->join('child_category', 'child_category.id', '=', 'assigned_kwds.child_cat_id')
							->select('keyword.keyword', 'child_category.child_category as child_category_name')
							->where('assigned_kwds.client_id', '=', $client->id)
							->limit(2)
							->get();




						$firstHalf = [];
						$secondHalf = [];
						$i = 1;
						$inPopupArr = [];
						foreach ($assignedKwds as $assignedKwd) {										 
															 ?>

												<li>
													<a href="{{url(Request::segment(1))}}/<?php echo generate_slug($assignedKwd->keyword) ?>"
														title="{{$assignedKwd->keyword}}"><?php echo $assignedKwd->keyword; ?></a>
												</li>


												<?php  }  ?>
											</ul>
										</div>


									</span>
								</div>
							</div>

							<div class="serchlist-txt-btn"><a href="javascript:void(0);" title="{{$client->business_name }}"
									class="sms-view common_popup_open"><span>Enquiry Now</span></a>&nbsp;&nbsp;&nbsp;<a
									href="{{ url('business-details') . "/" . $client->business_slug }}"
									title="{{$client->business_name }}" class="sms-view"><span>View Details</span></a></div>


						</div>

						<div class="col-sm-2 col-md-2 btnBox">
							<a href="{{ url('business-details') . "/" . $client->business_slug }}"
								title="{{$client->business_name }}"><span class="serchlist-txt-1">User Rating</span></a>
							<div class="serchlist-txt">
								<?php

						if ($client->comment_count > 0) {
							$avgRating = ($client->rating / (5 * $client->comment_count)) * 5;
							//	$avgRating = number_format($avgRating, 1, '.', '');
							$whole = floor($avgRating);
							$fraction = $avgRating - $whole;
							$remain = 5 - $whole;
							for ($i = 0; $i < $whole; ++$i) {

								echo "<a href='" . url('business-details') . "/" . $client->business_slug . "' class='emptystar fullstar'></a>";
							}
							if ($fraction > 0 && $fraction < 1) {

								echo "<a href='" . url('business-details') . "/" . $client->business_slug . "' class='emptystar halfstar'></a>";
								--$remain;
							}
							for ($i = 0; $i < $remain; ++$i) {

								echo "<a href='" . url('business-details') . "/" . $client->business_slug . "' class='emptystar'></a>";
							}
						} else {
							$avgRating = 0.0;
							for ($i = 0; $i < 5; ++$i) {

								echo "<a href='" . url('business-details') . "/" . $client->business_slug . "' class='emptystar'></a>";
							}
						}
										?>

								<a href="{{ url('business-details/' . $client->business_slug) }}"> <span class="serchlist-rating">
										({{ $avgRating ?? 0 }} Rating out of {{ $client->comment_count ?? 0 }} Votes)
									</span>
								</a>
							</div>
							<button class="serchlist-btn">Best Offer</button>
						</div>

						<div class="col-sm-12 col-md-12" style="padding-left:0;">
							<div class="clickBlick"><a href="{{ url('business-details') . '/' . $client->business_slug }}"><i
										class="fa fa-fw fa fa-sun-o" aria-hidden="true"></i></a><a
									href="{{ url('business-details') . '/' . $client->business_slug }}"
									title="{{$client->business_name }}"><span>Click here to view your friend rating</span></a></div>
						</div>
					</div>
				@endforeach
			@endif
		</div>

		<div class="col-sm-3 col-md-3 side-data reviews-box-1 scroll-on rightsidedata">
			@include('client.layouts.common_sidebar_form')
		</div>
	</div>


@endsection