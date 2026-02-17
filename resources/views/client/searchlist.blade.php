@extends('client.layouts.app')
@section('title')
	<?php  if (!empty($keyword->meta_title)) {
		$key = preg_replace('/{{city}}/i', ucfirst($city), $keyword->meta_title);
		echo trim($key);
	} else {
		$key = preg_replace('/{{city}}/i', ucfirst($city), $keyword->keyword);
		echo trim($key);
	}
		?>

@endsection
@section('keyword')
	<?php if (!empty($keyword->meta_keywords)) {
		$msg = preg_replace('/{{city}}/i', ucfirst($city), $keyword->meta_keywords);
		echo trim($msg);
	} ?>
@endsection
@section('description')
	<?php if (!empty($keyword->meta_description)) {
		$descrip = preg_replace('/{{city}}/i', ucfirst($city), $keyword->meta_description);
		echo trim($descrip);
	}   ?>
@endsection
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 third-add-section">

				<?php  

							if (!empty($keyword->child_banner)) {
		$cicons = unserialize($keyword->child_banner);
		if (!empty($cicons)) {
							?>

				<img loading="lazy" src="{{asset($cicons['child_banner']['src'])}}" alt="{{ $cicons['child_banner']['name'] }}">

				<?php  } else { ?>

				<img loading="lazy" src="<?php echo asset('client/images/computer-courses-training.jpg'); ?>"
					alt="computer-courses-training">
				<?php  }
	} else {

		if (!empty($keyword->category_banner)) {
			$cicons = unserialize($keyword->category_banner);
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
	<?php 
		if (!empty($keyword) || !empty($clientsList)) { ?>
	<div class="clearfix"></div>

	<div class="container">
		<div class="form-section">
			<div class="removeLeftSpace">
				<div class="hdTitle">
					@if(!empty($keyword))
								<?php
						$rating = $keyword->ratingvalue;
						$stars = 'star_4.75_new.png';
						$ext = '.png';
						switch ($rating) {
							case 0:
								$stars = 'star_1' . $ext;
								break;
							case 2:
								$stars = 'star_2' . $ext;
								break;
							case 3:
								$stars = 'star_3' . $ext;
								break;
							case 3.5:
								$stars = 'star_3.5_new' . $ext;
								break;
							case 4:
								$stars = 'star_4' . $ext;
								break;
							case 4.5:
								$stars = 'star_4.5_new' . $ext;
								break;
							case 4.75:
								$stars = 'star_4.75_new' . $ext;
								break;
							case 5:
								$stars = 'star_5_new' . $ext;
								break;
						}
										?>
								<div itemscope itemtype="https://schema.org/Product" style="font-size: 12px;font-weight: 500;">
									<div class="text-primary" itemprop="name">
										<h1><?php  if (!empty($keyword->keyword)) {
							$key = preg_replace('/{{city}}/i', ucfirst($city), $keyword->keyword);
							echo trim($key);
						} ?>
											in <?php echo ucfirst($city); ?> </h1>
									</div>
									<div itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
										<img loading="lazy" itemprop="image" src="{{ asset('client/images/' . $stars) }}"
											alt="5 Star Rating: Very Good" />
										<span itemprop="ratingValue"><?php if (!empty($keyword->ratingvalue)) {
							echo number_format((float) $keyword->ratingvalue, 1, '.', '');
						} else {
							echo "1.0";
						} ?></span>
										out of <span itemprop="bestRating"></span>
										based on <span itemprop="ratingCount">{{$keyword->ratingcount }}</span> ratings
									</div>
								</div>
					@endif
					<div class="keyword-cotegory-text">

						@if(!empty($keyword))
										<a href="{{url('child/' . $keyword->child_slug)}}" title="<?php if (!empty($keyword->child_category)) {
								echo $keyword->child_category;
							} ?>"><?php if (!empty($keyword->child_category)) {
								echo $keyword->child_category;
							} ?></a>
										/ <?php if (!empty($keyword->keyword)) {
								echo $keyword->keyword;
							}  ?> in <?php echo $city; ?>
						@endif
					</div>
				</div>


			</div>
			<div class="removeRightSpace">
				<div class="btn btn-primary popup-btn top-btn">Send Enquiry</div>
			</div>
		</div>

	</div>
	<div class="clearfix"></div>
	<script>
		$(document).ready(function () {
			$('.proceedBtn').click(function () {
				$('.proceedBtn').hide();
				$('.stopprocess').show();
				$('.formDiv').slideDown();
			});

			$('.stopprocess').click(function () {
				$('.stopprocess').removeAttr("style");
				$('.proceedBtn').show();
				$('.formDiv').slideUp();
			});

			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>





	<div class="container">

		<div class="col-sm-9 col-md-9 reviews-box-main mainContainer">
			<a href="#top"></a>

			@if(isset($keyword) && null != $keyword->top_description)
				<div class="col-xs-12 top_description" style="margin-top:20px;color:#033967">
					<h2>Trusted
						<?php  if (!empty($keyword->keyword)) {
					$key = preg_replace('/{{city}}/i', ucwords(str_replace("-", "", $city)), $keyword->keyword);
					echo trim($key);
				} ?>
						in <?php echo ucwords(str_replace("-", " ", Request::segment(1))); ?>
					</h2>

					<p title="<?php if (!empty($keyword->keyword)) {
					echo $keyword->keyword;
				} ?> in {{Request::segment(1)}}"><?php  if (!empty($keyword->top_description)) {
					$keydescription = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->top_description);
					echo trim($keydescription);
				} ?></p>
				</div>
			@endif


			 
<div class="services" >

<div id="recentSearchContainer">
</div>

</div>
 
			@if(!empty($clientsList->count()))
				<?php			

								$n = 0;?>
				@foreach($clientsList as $client)

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

													
													<a href="{{ url('business-details') . "/" . $client->business_slug }}"
														title="{{ $client->business_name ?? '' }}"><span class="serchlist-txt">
															<?php
										if (!empty($client->time)) {

											$times = json_decode($client->time);

											$today = strtolower(date('l'));

											if (
												!empty($times) &&
												isset($times->$today) &&
												!empty($times->$today->from) &&
												!empty($times->$today->to)
											) {

											?>
											<i class="fa fa-fw fa-clock-o serchlist-icon" aria-hidden="true"></i>
											<?php
												echo "Opening Hrs (" . $times->$today->from . " - " . $times->$today->to . ")";
											}  

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
										class="sms-view popup-btn"><span>Enquiry Now</span></a>&nbsp;&nbsp;&nbsp;<a
										href="https://wa.me/917559435943" title="{{$client->business_name }}" class="whatsapp-view"
										target="_blank" rel="noopener noreferrer"><span><img src="{{ asset('client/WhatsApp.svg')}}" width="20">	
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
								<button class="serchlist-btn" title="Best Offer {{$client->business_name }}">Enquiry Now</button>
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
				<ul id="pagin"></ul>
			@else
				<?php 
						if (!empty($keyword->heading)) {

					$i = 0;
					$i++;	?>

				<div class="col-sm-12 col-md-12 reviews-box-1 line-content">
					<div class="client-list-first">

						<style>
							.abt-accordion .card {
								border-radius: 0;
								border: 1px solid rgba(179, 179, 179, 0.45);
								margin-bottom: 10px;
								max-width: 960px;
								border-radius: 0;
								box-shadow: 0 0 5px 3px #d4d4d466;
							}


							.card {
								position: relative;
								display: -ms-flexbox;
								display: flex;
								-ms-flex-direction: column;
								flex-direction: column;
								min-width: 0;
								word-wrap: break-word;
								background-color: #fff;
								background-clip: border-box;
								border: 1px solid rgba(0, 0, 0, .125);
								border-radius: .25rem;
							}

							.abt-accordion .card .card-header {
								padding: 7px;
								background: none;
								border: none;
							}

							.card-header:first-child {
								border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
							}

							.abt-accordion .card .card-header h2 button {
								display: flex;
								align-items: center;
								justify-content: space-between;
								width: 100%;
								text-decoration: none;
								border-radius: 0;
								font-weight: 700;
								margin-left: 3%;
							}

							.abt-accordion .card .collapse.show {
								position: relative;
							}

							.card-body {
								-ms-flex: 1 1 auto;
								flex: 1 1 auto;
								padding: 1.25rem;
								font-weight: 400;
								font-size: 13px !important;
								margin-bottom: 0;
								line-height: 1.7;
								padding-left: 1.5em;
								color: #212529 !important;
							}

							.about-accordian .card-body p {
								padding-left: 0;
								margin-bottom: 0;
							}

							.card-body p {
								font-weight: 400;
								font-size: 13px;
								margin-bottom: 10px;
								line-height: 1.7;
								padding-left: 1.5em;
							}

							.about-accordian ul {
								list-style: none;
							}

							.about-accordian .card-body ul li:first-child {
								margin-top: 0;
							}

							.about-accordian .card-body ul li {
								position: relative;
								font-weight: 400;
								font-size: 13px !important;
								line-height: 1.7;
								margin-left: 0;
								margin-bottom: 11px;
								margin-top: 10px;
								text-align: justify;
							}

							.about-accordian .card-body ul ul {
								position: relative;
								font-weight: 400;
								font-size: 13px !important;
								line-height: 1.7;
								margin-left: 22px;
							}

							.about-accordian ul {
								list-style: none;
							}

							.abt-accordion .card .collapse.show::before {
								content: '';
								width: 94%;
								height: 1px;
								position: absolute;
								top: 0;
								left: 0;
								background-color: #02b0af;
								margin-left: 3%;
							}

							.about-accordian .card-body ul ul li {
								margin-bottom: 0;
								margin-top: 0;
							}

							.about-accordian ul ul p::before {
								content: " ";
								position: absolute;
								top: 3px;
								left: -16px;
								display: inline-block;
								-webkit-transform: rotate(45deg);
								-ms-transform: rotate(45deg);
								transform: rotate(45deg);
								height: 1em;
								width: .5em;
								border-bottom: .2em solid #ff5f14;
								border-right: .2em solid #ff5f14;
							}
						</style>

						<div class="about-accordian">

							<div class="abt-accordion" id="courseAcrdMain">

								<div class="card">
									<div class="card-header" id="abthdgOne">
										<h2 class="mb-0"><button type="button" class="btn-link"
												data-target="#heading_<?php echo $keyword->key_id; ?>"
												data-parent="#courseAcrdMain">
												<span>{!!$keyword->heading!!}</span> </button> </h2>
									</div>
									<div id="heading_<?php echo $keyword->key_id; ?>" class="collapse <?php if ($i == 1) {
						echo "show";
					} ?>" aria-labelledby="abthdgOne">
										<div class="card-body">
											<ul>

												@if($keyword->courseabout)
																			<li style="font-size: 13px;">
																				<?php $courseabout = preg_replace('/{{city}}/i', ucfirst($city), $keyword->courseabout);
													echo trim($courseabout); ?>

																			</li>
												@endif
												<ul>
													@if($keyword->paragraph1)
																					<li>
																						<p style="font-size: 13px;">
																							<?php $paragraph1 = preg_replace('/{{city}}/i', ucfirst($city), $keyword->paragraph1);
														echo trim($paragraph1); ?>

																						</p>
																					</li>

													@endif
													@if($keyword->paragraph2)
																					<li>
																						<p style="font-size: 13px;">
																							<?php $paragraph2 = preg_replace('/{{city}}/i', ucfirst($city), $keyword->paragraph2);
														echo trim($paragraph2); ?>

																						</p>
																					</li>
													@endif

													@if($keyword->paragraph3)
																					<li>
																						<p style="font-size: 13px;">
																							<?php $paragraph3 = preg_replace('/{{city}}/i', ucfirst($city), $keyword->paragraph3);
														echo trim($paragraph3); ?>

																						</p>
																					</li>
													@endif

													@if($keyword->paragraph4)
																					<li>
																						<p style="font-size: 13px;">
																							<?php $paragraph4 = preg_replace('/{{city}}/i', ucfirst($city), $keyword->paragraph4);
														echo trim($paragraph4); ?>
																						</p>
																					</li>
													@endif

													@if($keyword->paragraph5)
																					<li>
																						<p style="font-size: 13px;">
																							<?php $paragraph5 = preg_replace('/{{city}}/i', ucfirst($city), $keyword->paragraph5);
														echo trim($paragraph5); ?>
																						</p>
																					</li>
													@endif


													@if($keyword->paragraph6)
																					<li>
																						<p style="font-size: 13px;">

																							<?php $paragraph6 = preg_replace('/{{city}}/i', ucfirst($city), $keyword->paragraph6);
														echo trim($paragraph6); ?>
																						</p>
																					</li>
													@endif
												</ul>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php  } ?>
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
				pageSize = 10;
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
								href="{{ url('business-details') . "/" . $client->business_slug }}"
								title="{{$client->business_name }}">
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


							<a href="{{ url('business-details') . "/" . $client->business_slug }}"
								title="{{$client->business_name }}">
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
			@include('client.layouts.sidebar_form')
		</div>
	</div>


	<div class="clearfix"></div>
	<br>
	@if(!empty($keyword->bottom_description))
		<div class="container">
			<div class="category-description">
				<?php  if (!empty($keyword->bottom_description)) {
					$keydescription = preg_replace('/{{city}}/i', ucwords(str_replace("-", " ", Request::segment(1))), $keyword->bottom_description);
					echo $keydescription;
				}
						  ?>







			</div>


		</div>
	@endif



	@if(!empty($keyword))
	 
 
		
		@if(!empty($keyword) && $kwdsList->isNotEmpty())

			<div class="container">

				<div class="category-box">
					<div class="course-program">

						<h5>Find Services Related to <?php if (!empty($keyword->keyword)) {
							echo $keyword->keyword;
						} ?> </h5>
						<ul class="">


							@if(!empty($kwdsList))
								<?php $i = 0;
								$x = 5; ?>
								@foreach($kwdsList as $keyicon)

									<li>
										<?php  if (!empty($keyicon->icon)) {

											$data = json_decode($keyicon->icon, true);
											if (!empty($data)) {
														?>

										<img loading="lazy" src="{{asset('' . $data['src'])}}" alt="{{ $data['name'] }}" width="25">

										<?php  }
										} ?>

										<a href="{{url(strtolower(Request::segment(1)))}}/<?php echo generate_slug($keyicon->keyword) ?>"
											title="<?php if (!empty($keyicon->keyword)) {
											echo $keyicon->keyword;
										} ?> in {{Request::segment(1)}}">{{$keyicon->keyword}}
											| </a>
									</li>

								@endforeach
							@endif
						</ul>
					</div>
				</div>


			</div>
		@endif
	@endif



	@if(!empty($keyword->faqq1))
		<div class="container">
			<div class="category-description">
				<h4>FAQ:-
					<?php  if (!empty($keyword->keyword)) {
					$key = preg_replace('/{{city}}/i', ucfirst($city), $keyword->keyword);
					echo trim($key);
				} ?>
					in <?php echo ucfirst(Request::segment(1)); ?>
				</h4>
				<div itemscope itemtype="https://schema.org/FAQPage">
					<?php if (!empty($keyword->faqq1)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($keyword->faqq1)) {
						$faqq1 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqq1);
						echo trim($faqq1);
					} ?>?</strong></h5>
						<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="display: block;">
							<div itemprop="text">
								<?php  if (!empty($keyword->faqa1)) {
						$faqa1 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqa1);
						echo trim($faqa1);
					} ?>


							</div>
						</div>
					</div>
					<?php } ?>


					<?php if (!empty($keyword->faqq2)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($keyword->faqq2)) {
						$faqq2 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqq2);
						echo trim($faqq2);
					} ?>?</strong></h5>
						<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
							<div itemprop="text">
								<?php  if (!empty($keyword->faqa2)) {
						$faqa2 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqa2);
						echo trim($faqa2);
					} ?>

							</div>
						</div>
					</div>
					<?php } ?>
					<?php if (!empty($keyword->faqq3)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($keyword->faqq3)) {
						$faqq3 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqq3);
						echo trim($faqq3);
					} ?>?</strong></h5>
						<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
							<div itemprop="text">
								<?php  if (!empty($keyword->faqa3)) {
						$faqa3 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqa3);
						echo trim($faqa3);
					} ?>

							</div>
						</div>
					</div>
					<?php } ?>
					<?php if (!empty($keyword->faqq4)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($keyword->faqq4)) {
						$faqq4 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqq4);
						echo trim($faqq4);
					} ?>?</strong></h5>
						<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
							<div itemprop="text">
								<?php  if (!empty($keyword->faqa4)) {
						$faqa4 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqa4);
						echo trim($faqa4);
					} ?>

							</div>
						</div>
					</div>
					<?php } ?>
					<?php if (!empty($keyword->faqq5)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($keyword->faqq5)) {
						$faqq5 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqq5);
						echo trim($faqq5);
					} ?>?</strong></h5>
						<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
							<div itemprop="text">
								<?php  if (!empty($keyword->faqa5)) {
						$faqa5 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqa5);
						echo trim($faqa5);
					} ?>

							</div>
						</div>
					</div>
					<?php } ?>
					<?php if (!empty($keyword->faqq6)) { ?>
					<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
						<h5 itemprop="name"><strong><?php  if (!empty($keyword->faqq6)) {
						$faqq6 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqq6);
						echo trim($faqq6);
					} ?>?</strong></h5>
						<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
							<div itemprop="text">
								<?php  if (!empty($keyword->faqa6)) {
						$faqa6 = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->faqa6);
						echo trim($faqa6);
					} ?>

							</div>
						</div>
					</div>
					<?php } ?>




				</div>

			</div>


		</div>
	@endif



	@if(!empty($keyword))
		<div class="container">
			<div class="category-box">
				<div class="course-program">
					<h5>Find <?php if (!empty($keyword->keyword)) {
					echo $keyword->keyword;
				} ?> other Location</h5>
					<ul class="">
						<?php $cities = getCity(); ?>
						@if(!empty($cities))
								<?php $i = 0;
							$x = 5; ?>
								@foreach($cities as $citys)

									<li><a href="{{url(strtolower($citys->city))}}/<?php if (!empty($keyword->keyword)) {
										echo generate_slug($keyword->keyword);
									} ?>" title="<?php if (!empty($keyword->keyword)) {
										echo $keyword->keyword;
									} ?> in {{Request::segment(1)}}">@if(!empty($keyword->keyword)){!!$keyword->keyword!!}@endif
											in {{$citys->city}} |</a></li>
								@endforeach
						@endif

					</ul>
				</div>
			</div>
		</div>
	@endif



	<div class="clearfix"></div>
	<br>


	<?php } else { ?>


	<div class="container">

		<div class="row">
			<div class="col-sm-12 col-md-12 banner-details">
				<h4 class="Oops-txt">Oops! No Result Found </h4>
				<h2 class="error-txt"></h2>
			</div>
		</div>

	</div>
	<div class="clearfix"></div>
	<div class="container">

		<div class="add-section">
			<div class="col-xs-12">

				<?php if (!empty($clientLists)): ?>
				<?php foreach ($clientLists as $client):
				$image = '';
				if ($client->logo != ''):
					$image = unserialize($client->logo);
					$image = $image['large']['src'];

					?>

				<div class="col-md-3">
					<div class="inner-client-div">

						<figure><img loading="lazy" class="" src="<?php echo asset($image); ?>" alt="{{ $client->business_name }}"
								style="width:100%;"></figure>
						<div class="grid-info">
							<h3><a href="{{url('business-details') . '/' . generate_slug($client->business_slug)}}"
									title="{{$client->business_name}}" tabindex="0">
									<div title="{{$client->business_name}}"><strong>{{$client->business_name}}</strong>
									</div>
								</a></h3>

							<strong>{{ucfirst($client->city)}}</strong>
							<a href="{{url('business-details') . '/' . generate_slug($client->business_slug)}}"
								class="get-quotes" tabindex="0">View</a>
						</div>
					</div>
				</div>


				<?php 
					endif;
			endforeach;

		endif
					?>
			</div>
		</div>
	</div>

	<?php  } ?>

	<div class="inquiry-popup"></div>

	<a href="javascript:void(0);" class="dealclosebtn">&nbsp;</a>



	<style>
		.form-container {
			max-height: 420px;
			/* adjust height */
			overflow-y: auto;
			padding-right: 8px;
			/* space for scrollbar */
		}


		.form-container {
			max-height: 420px;
			overflow-y: auto;
			padding-right: 8px;
		}

		/* Scrollbar width */
		.form-container::-webkit-scrollbar {
			width: 6px;
		}

		/* Track */
		.form-container::-webkit-scrollbar-track {
			background: #f1f1f1;
			border-radius: 10px;
		}

		/* Thumb */
		.form-container::-webkit-scrollbar-thumb {
			background: linear-gradient(180deg, #0a5bd3, #0a6adf);
			border-radius: 10px;
		}

		/* Hover */
		.form-container::-webkit-scrollbar-thumb:hover {
			background: #084298;
		}
	</style>




	<script type="text/javascript">
		document.addEventListener('input', function (e) {

			// ✅ run only for mobile field inside autoLeadForm
			if (!e.target.matches('.autoLeadForm input[name="mobile"]')) return;

			let form = e.target.closest('.autoLeadForm');
			if (!form) return;

			let formData = new FormData(form);

			let name = formData.get('name');
			let mobile = formData.get('mobile');
			let kw_text = formData.get('kw_text');
			let city_id = formData.get('city_id');
			let from_page = formData.get('from_page');

			if (name && mobile && mobile.length >= 10 && mobile.length <= 16) {

				fetch('lead/auto-form-save', {
					method: 'POST',
					headers: {
						'Accept': 'application/json',
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					},
					body: formData
				})
					.then(res => res.json())
					.then(data => {
						// console.log('Saved', data);
					})
					.catch(err => {
						console.error('Error:', err);
					});
			}
		});
	</script>







	<div class="searchPopup">
		<a href="javascript:void(0);" class="dealclosebtn">&nbsp;</a>


		<div class="callback-wrapper">
			<div class="left-panel">
				<h2>Begin your journey with QuickDials</h2>
				<p><strong>Connect with trusted experts effortlessly</strong></p>
				<div class="benefits">
					<h4>Trust & Benefits:</h4>
					<ul>
						<li>✔ Shared only with selected experts</li>
						<li>✔ Get Free Expert Online Counseling</li>
						<li>✔ Industry-Certified Instructors</li>
						<li>✔ Book Your Free Education Demo Class</li>
						<li>✔ Get Fees & Discounts</li>
					</ul>
				</div>
			</div>
			<div class="right-panel">
				<h2>Need Expert Advice ?</h2>
				<p>Fill this form to Grab the best Deals on "<span
						class="orng"><?php echo isset($searchedKW) ? $searchedKW : ''; ?> In {{Request::segment(1)}}</span>"
				</p>

				<div class="popup-box">



					<!-- Progress -->
					<div class="popupSteps">
						<span class="active"></span>
						<span></span>
						<!-- <span></span> -->
						<span></span>
					</div>

					 
					<form class="popup-form" id="leadForm" onsubmit="return homeController.saveTwoEnquiry(this)"
						method="POST">

						<!-- STEP 1 -->
						<div class="popup-step active">
							<span>Your Details</span>

							<div class="erbr">
								<input type="text" name="name" placeholder="Full Name">
							</div>
							<div class="erbr">
								<input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
							</div>


							<input type="hidden" name="lead_form" value="1" />
							<input type="hidden" name="kw_text" id="kw_text"
								value="<?php echo isset($searchedKW) ? $searchedKW : ''; ?>" />
							<input type="hidden" name="city_id" id="city_id" class="city" value="{{Request::segment(1)}}" />
							<input type="hidden" name="from_page" id="from_page" value="{{ request()->path() }}">


							<div class="div-code">
								<div class="drop-number dropwn">
									<div class="dropdown">
										<div class="drop-input-wrapper form-group">
											<img loading="lazy" class="flag-icon selectedFlag" src="https://flagcdn.com/w40/in.png"
												alt="Flag">

											<input type="text" class="dropwn-input" placeholder="Search country">
											<span class="clear-icon removeFlag">&#10005;</span>
											<span class="dropdown-icon">&#9662;</span>
										</div>
										<div class="erbr">
											<input type="hidden" class="countryCode" name="code">
										</div>
										<div class="dropdown-list"></div>
									</div>

									<div class="quick_arrow form-group erbr">
										<input type="tel" class="quick-remove" name="mobile" maxlength="15"
											placeholder="Phone No*">
									</div>
								</div>
							</div>
							<div class="erbr">
								What is your <strong>Location?</strong>
								<select name="location" class="select2_location">
									@if(!empty($zones))
										@foreach($zones as $zone)
											<option value="{{ $zone->id}}">{{ $zone->zone }}</option>

										@endforeach
									@endif
								</select>
							</div>


							<div class="btn-center">
								<button type="button" onclick="validateStep(this, 1)">Save & Continue</button>
							</div>
						</div>
						<!-- STEP 2 -->
						<div class="popup-step">
							<span>Your Plan</span>
							<input type="hidden" name="kw_text" id="kw_text"
								value="<?php echo isset($searchedKW) ? $searchedKW : ''; ?>" />
							<div class="fieldblock">

								<div class="erbr">
									@if($keyword->form_type == 'form_edu')

										<div class="fieldblock-form">

											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="fresher">
												<span>Fresher</span>
											</label>

											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="online" checked>
												<span>Online</span>
											</label>

											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="offline">
												<span>Offline</span>
											</label>

											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="crashcourse">
												<span>Crash Course</span>
											</label>
										</div>
									@elseif($keyword->form_type == 'form_pg')

										<div class="fieldblock-form">
											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="shared">
												<span>Shared</span>
											</label>

											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="single">
												<span>Single</span>
											</label>

											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="male">
												<span>Male</span>
											</label>

											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="female">
												<span>Female</span>
											</label>
										</div>
									@elseif($keyword->form_type == 'form_doctor')

										<link
											href="{{asset('vendor/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}"
											rel="stylesheet">
										<link href="{{asset('admin/vendor/datepicker/jquery-ui.css')}}" rel="stylesheet">
										<link href="{{asset('business/assets/css/daterangepicker.css')}}" rel="stylesheet">


										<div class="fieldblock-form">
											<label class="radio-item">
												<span>Appointment</span>
											</label>



											<div class="form-group input-icon">


												<input type="text" name="appointment" placeholder="Select Date"
													class="appointment">

												<link rel="stylesheet"
													href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
												<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

												<script>
													$(document).ready(function () {
														$('.appointment').datepicker({
															minDate: 0,
															dateFormat: 'yy-mm-dd',
															changeMonth: true,
															changeYear: true
														});
													});
												</script>
											</div>
										</div>

									@elseif($keyword->form_type == 'form_serv')

										<div class="fieldblock-form">
											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="ac_split">
												<span>AC Split</span>
											</label>

											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="ac_window">
												<span>AC Window</span>
											</label>

											<label class="radio-item">
												<input type="checkbox" name="frmcheck[]" value="freez_single_door">
												<span>Freeze Single Door</span>
											</label>
										</div>
									@else
										<div class="fieldblock-form">
											<input type="hidden" name="frmcheck[]" value="none">

										</div>
									@endif
								</div>
							</div>

							<div class="erbr">
								What’s your <strong>Age</strong>
								<select name="age" class="select2_age">
									<option value="">Select Age*</option>
									@for($i = 1; $i < 100; $i += 2)
										<option value="{{$i}}" {{ $i == 19 ? 'selected' : '' }}>{{ $i }} + Age</option>
									@endfor
								</select>
							</div>
							<div class="erbr">
								When you want to <strong>Start</strong>
								<select name="plan" class="select2_plane">
									<option value="Immediate" selected>Immediate</option>
									<option value="Within week">Within Week</option>
									<option value="Within months">Within Months </option>
									<option value="Not planned yet">Not Planned Yet</option>
								</select>
							</div>


							<div class="erbr">

								<select name="experience">

									<option value="">Select Experience*</option>

									@for($i = 1; $i < 50; $i += 2)
										<option value="{{$i}}" {{ $i == 3 ? 'selected' : '' }}>{{ $i }} + Exp</option>
									@endfor
								</select>
							</div>


							<div class="btn-center">
								<button type="button" onclick="prevPopupStep()">Back</button>
								<button type="button" onclick="validateStep(this,2)">Save & Continue</button>
							</div>
						</div>

						<!-- STEP 3 -->
						<div class="popup-step">
							<span>Confirm</span>
							<div class="erbr">
								<textarea name="remark" placeholder="Enter Remarks"></textarea>
							</div>

							<div class="terms">
								<input type="checkbox" name="terms" value="1" checked />
								I agree to the Quickdials terms and conditions <a href="{{ url('terms-conditions') }}">Terms
									& Conditions</a>
							</div>

							<div class="btn-center">
								<button type="button" onclick="prevPopupStep()">Back</button>
								<button type="submit">Submit</button>

							</div>
						</div>

					</form>
				</div>

			</div>
		</div>




	</div>


	<script>

		let currentPopupStep = 0;
		const popupSteps = document.querySelectorAll(".popup-step");

		const popupIndicators = document.querySelectorAll(".popupSteps span");


		function validateStep(THIS, step) {

			var $this = $(THIS);
			let form = document.getElementById('leadForm');
			let formData = new FormData(form);

			// add extra value
			formData.append('step', step);

			fetch('/form/validate-step', {
				method: 'POST',
				headers: {
					'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
				},
				body: formData
			})
				.then(res => res.json())
				.then(res => {
					if (res.status) {
						nextPopupStep();
					} else {
						showsErrors($('#leadForm'), res.errors);
					}
				});
		}




		function showsErrors($form, errors) {

			// remove old errors
			$form.find('.erbr').removeClass('has-error');
			$form.find('.help-block').remove();

			$.each(errors, function (key, messages) {

				if (key === 'frmcheck') {

					$input = $form.find('input[name="frmcheck[]"]');

				} else {
					let name = key.replace(/\./g, '\\.');
					$input = $form.find('[name="' + name + '"]');
				}

				if ($input.length) {
					let $wrapper = $input.closest('.erbr');

					$wrapper.addClass('has-error');

					$wrapper.append(
						'<span class="help-block"><strong>' + messages[0] + '</strong></span>'
					);
				}
			});
		}



		function nextPopupStep() {

			if (currentPopupStep < popupSteps.length - 1) {
				popupSteps[currentPopupStep].classList.remove("active");
				popupIndicators[currentPopupStep].classList.remove("active");
				currentPopupStep++;
				popupSteps[currentPopupStep].classList.add("active");
				popupIndicators[currentPopupStep].classList.add("active");
			}
		}

		function prevPopupStep() {
			if (currentPopupStep > 0) {
				popupSteps[currentPopupStep].classList.remove("active");
				indicators[currentPopupStep].classList.remove("active");
				currentPopupStep--;
				popupSteps[currentPopupStep].classList.add("active");
				indicators[currentPopupStep].classList.add("active");
			}
		}


	</script>





@endsection