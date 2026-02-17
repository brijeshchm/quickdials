<?php $__env->startSection('title'); ?>
Quick Dials | A Local Search Engine for Businesses in <?php echo e(Request::segment(1)); ?>

<?php $__env->stopSection(); ?> 
<?php $__env->startSection('keyword'); ?> 
Find Best It Training Centre near in <?php echo e(Request::segment(1)); ?>, Find Best It Training Institute near in <?php echo e(Request::segment(1)); ?>, Find Top 10 IT Training Institute near in <?php echo e(Request::segment(1)); ?>, Find Best Entrance Exam Preparation Centre Near in <?php echo e(Request::segment(1)); ?>, Top 10 Entrance Exam Centre Near in <?php echo e(Request::segment(1)); ?>, Find Best Distance Education Centre Near in <?php echo e(Request::segment(1)); ?>, Find Top 10 Distance Education Centre Near in <?php echo e(Request::segment(1)); ?>, Find Best School And Colleges Near in <?php echo e(Request::segment(1)); ?>, Find Top 10 school And College Near in <?php echo e(Request::segment(1)); ?>, Get Education Loan, GET Free career Counselling, Find Best overseas education consultants Near in <?php echo e(Request::segment(1)); ?>, Find Top 10 overseas education consultants Near in <?php echo e(Request::segment(1)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?> 
Find Only Certified Training Institutes in <?php echo e(Request::segment(1)); ?>, Coaching Centers near in <?php echo e(Request::segment(1)); ?> on QuickDials and Get Free counseling, Free Demo Classes, and Get Placement Assistence in <?php echo e(Request::segment(1)); ?>.
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	

    <div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 third-add-section">

				<?php  

						if (!empty($clientBanner->child_banner)) {
		$cicons = unserialize($clientBanner->child_banner);
		if (!empty($cicons)) {
						?>

				<img loading="lazy" src="<?php echo e(asset($cicons['child_banner']['src'])); ?>" alt="<?php echo e($cicons['child_banner']['name']); ?>">

				<?php  } else { ?>

				<img loading="lazy" src="<?php echo asset('client/images/computer-courses-training.jpg'); ?>"
					alt="computer-courses-training">
				<?php  }
	} else {

		if (!empty($clientBanner->category_banner)) {
			$cicons = unserialize($clientBanner->category_banner);
			if ($cicons) {
						?>

				<img loading="lazy" src="<?php echo e(asset($cicons['category_banner']['src'])); ?>" alt="<?php echo e($cicons['category_banner']['name']); ?>">


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

		 
			<?php if($cityclients->isNotEmpty()): ?> 
				<?php			

						$n = 0;?>
				<?php $__currentLoopData = $cityclients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					<div class="col-sm-12 col-md-12 reviews-box-1 line-content">
						<div class="client-list-first">
							<div class="col-sm-4 col-md-4 serchlist-img "><a
									href="<?php echo e(url('business-details') . "/" . $client->business_slug); ?>"
									title="<?php echo e($client->business_name); ?>">
									<?php if (null != $client->logo) {
							$profilePic = unserialize($client->logo);
										?><img loading="lazy" src="<?php echo asset('' . $profilePic['large']['src']); ?>" alt="<?php echo e($client->business_name); ?>"
										title="<?php echo e($client->business_name); ?>" height="141" /><?php
						} else {
										?><img loading="lazy" src="<?php echo asset('client/images/default_pp_small.png'); ?>" alt="Business Logo"
										title="Business Logo" height="141" style="width:100%" /><?php
						}
									?>
									<?php if($client->client_type != 'FreeListing'): ?>
										<p><a href="#"><i class="fa fa-fw fa fa-thumbs-up icon" aria-hidden="true"></i></a></p>
									<?php endif; ?>
								</a>

							</div>
							<div class="col-sm-6 col-md-6 aboutcomp">
								<?php if($client->certified_status): ?>
									<div class="client-trusted">
										<?php if($client->certified_status): ?>
											<img loading="lazy" src="<?php echo e(asset('img/q_verified.gif')); ?>">
										<?php endif; ?>
										<?php if($client->trusted_status): ?>
											<img loading="lazy" src="<?php echo e(asset('img/q_trust.gif')); ?>">
										<?php endif; ?>
										<?php if($client->gst_status): ?>
											<img loading="lazy" src="<?php echo e(asset('img/q_gst.gif')); ?>">
										<?php endif; ?>
									</div>
								<?php endif; ?>
								<div class="serchlist-txt">
									<a href="<?php echo e(url('business-details') . "/" . $client->business_slug); ?>"
										title="<?php echo e($client->business_name); ?>">
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
											href="<?php echo e(url('business-details') . "/" . $client->business_slug); ?>"><?php echo e(ucfirst(strtolower($addr->substr))); ?></a>
										<a href="#" data-toggle="tooltip" data-placement="bottom"
											title="<?php echo e($addr->fullstr); ?>">more</a>
										<?php else: ?>
										<a
											href="<?php echo e(url('business-details') . "/" . $client->business_slug); ?>"><?php echo e(ucfirst(strtolower($addr->substr))); ?></a>
										<?php endif; ?>
									</div>
									<?php						
										}
									?>

									<?php if(!empty($client->time)): ?>
												<div class="serchlist-txt">

													<i class="fa fa-fw fa-clock-o serchlist-icon" aria-hidden="true"></i>
													<a href="<?php echo e(url('business-details') . "/" . $client->business_slug); ?>"
														title="<?php echo e($client->business_name); ?>"><span class="serchlist-txt">
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
									<?php endif; ?>

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
															title="<?php echo e($assignedKwd->keyword); ?>"
															class="keystore"><?php echo $assignedKwd->keyword; ?></a>
													</li>
													<?php  }  ?>
												</ul>
											</div>


										</span>
									</div>
								</div>

								<div class="serchlist-txt-btn"><a href="javascript:void(0);" title="<?php echo e($client->business_name); ?>"
										class="sms-view common_popup_form"><span>Enquiry Now</span></a>&nbsp;&nbsp;&nbsp;<a
										href="https://wa.me/917559435943" title="<?php echo e($client->business_name); ?>" class="whatsapp-view"
										target="_blank" rel="noopener noreferrer"><span><i class="fa fa-whatsapp"></i>
											WhatsApp</span></a> &nbsp;&nbsp;&nbsp;<a
										href="<?php echo e(url('business-details') . "/" . $client->business_slug); ?>"
										title="<?php echo e($client->business_name); ?>" class="sms-view"><span>Vew Details</span></a></div>


							</div>
						</div>
						<div class="client-list-second">
							<div class="col-sm-2 col-md-2 btnBox">
								<a href="<?php echo e(url('business-details') . "/" . $client->business_slug); ?>"><span
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

									<a href="<?php echo e(url('business-details/' . $client->business_slug)); ?>">
										<span class="serchlist-rating">
											(<?php echo e($avgRating ?? 0); ?> Rating out of <?php echo e($client->comment_count ?? 0); ?> Votes)
										</span>
									</a>
								</div>
								<button class="common_popup_form enquiry-now" title="Best Offer <?php echo e($client->business_name); ?>">Enquiry Now</button>
							</div>
							<div class="col-sm-12 col-md-12" style="padding-left:0;">
								<div class="clickBlick"><a
										href="<?php echo e(url('business-details') . '/' . $client->business_slug . '/#rewandrate'); ?>"
										title="<?php echo e($client->business_name); ?>"><i class="fa fa-fw fa fa-sun-o"
											aria-hidden="true"></i></a><a
										href="<?php echo e(url('business-details') . '/' . $client->business_slug . ''); ?>"
										title="<?php echo e($client->business_name); ?>"><span>Click here to view your friend rating</span></a>

								</div>


							</div>

						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<a href="#top" id="top"></a>
				<ul id="pagin"></ul>
			 
			<?php endif; ?>
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


			<?php if(!empty($onlyClients)): ?>
				<?php $__currentLoopData = $onlyClients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-sm-12 col-md-12 reviews-box-1">
						<div class="col-sm-4 col-md-4 serchlist-img "><a
								href="<?php echo e(url('business-details') . "/" . $client->business_slug); ?>" title="<?php echo e($client->business_name); ?>">
								<?php if (!empty($client->logo)) {
							$profilePic = unserialize($client->logo);
										?><img loading="lazy" src="<?php echo asset($profilePic['large']['src']); ?>" alt="Logo" height="141" /><?php
						} else {
										?><img loading="lazy" src="<?php echo asset('client/images/default_pp_small.jpg'); ?>" alt="Logo" height="141"
									style="width:100%" /><?php
						}
									?>
								<?php if($client->client_type != 'FreeListing'): ?>
									<p><a href="javascript:void(0)"><i class="fa fa-fw fa fa-thumbs-up serchlist-location-icon"
												aria-hidden="true"></i></a></p>
								<?php endif; ?>
							</a>
						</div>
						<div class="col-sm-5 col-md-5 aboutcomp">


							<a href="<?php echo e(url('business-details') . "/" . $client->business_slug); ?>" title="<?php echo e($client->business_name); ?>">
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
									<a href="<?php echo e(url('business-details') . "/" . $client->business_slug); ?>"><?php echo e($addr->substr); ?></a>
									<a href="#" data-toggle="tooltip" data-placement="bottom" title="<?php echo e($addr->fullstr); ?>">more</a>
									<?php else: ?>
									<a href="<?php echo e(url('business-details') . "/" . $client->business_slug); ?>"><?php echo e($addr->substr); ?></a>
									<?php endif; ?>
								</div>
								<?php
						}
									?>


								<div class="serchlist-txt"><i class="fa fa-fw fa-clock-o serchlist-icon" aria-hidden="true"></i>
									<a href="<?php echo e(url('business-details') . "/" . $client->business_slug); ?>"
										title="<?php echo e($client->business_name); ?>"><span class="serchlist-txt">
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
													<a href="<?php echo e(url(Request::segment(1))); ?>/<?php echo generate_slug($assignedKwd->keyword) ?>"
														title="<?php echo e($assignedKwd->keyword); ?>"><?php echo $assignedKwd->keyword; ?></a>
												</li>


												<?php  }  ?>
											</ul>
										</div>


									</span>
								</div>
							</div>

							<div class="serchlist-txt-btn"><a href="javascript:void(0);" title="<?php echo e($client->business_name); ?>"
									class="sms-view common_popup_open"><span>Enquiry Now</span></a>&nbsp;&nbsp;&nbsp;<a
									href="<?php echo e(url('business-details') . "/" . $client->business_slug); ?>"
									title="<?php echo e($client->business_name); ?>" class="sms-view"><span>View Details</span></a></div>


						</div>

						<div class="col-sm-2 col-md-2 btnBox">
							<a href="<?php echo e(url('business-details') . "/" . $client->business_slug); ?>"
								title="<?php echo e($client->business_name); ?>"><span class="serchlist-txt-1">User Rating</span></a>
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

								<a href="<?php echo e(url('business-details/' . $client->business_slug)); ?>"> <span class="serchlist-rating">
										(<?php echo e($avgRating ?? 0); ?> Rating out of <?php echo e($client->comment_count ?? 0); ?> Votes)
									</span>
								</a>
							</div>
							<button class="serchlist-btn">Best Offer</button>
						</div>

						<div class="col-sm-12 col-md-12" style="padding-left:0;">
							<div class="clickBlick"><a href="<?php echo e(url('business-details') . '/' . $client->business_slug); ?>"><i
										class="fa fa-fw fa fa-sun-o" aria-hidden="true"></i></a><a
									href="<?php echo e(url('business-details') . '/' . $client->business_slug); ?>"
									title="<?php echo e($client->business_name); ?>"><span>Click here to view your friend rating</span></a></div>
						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
		</div>

		<div class="col-sm-3 col-md-3 side-data reviews-box-1 scroll-on rightsidedata">
			<?php echo $__env->make('client.layouts.common_sidebar_form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
		</div>
	</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/quickdials/public_html/resources/views/client/cityclients.blade.php ENDPATH**/ ?>