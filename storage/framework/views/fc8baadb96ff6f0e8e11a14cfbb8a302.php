<?php $__env->startSection('title'); ?>
<?php $__env->startSection('title'); ?>
<?php if(!empty($keyword->meta_title)): ?>	
<?php   
$key = preg_replace('/in {{city}}/i','',$keyword->meta_title);
echo trim($key);   ?>
<?php else: ?>
	<?php if(!empty($keyword->keyword)): ?><?php echo $keyword->keyword; ?><?php endif; ?>  

<?php endif; ?>
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('keyword'); ?>
<?php if(!empty($keyword->meta_keywords)){
$msg = preg_replace('/in {{city}}/i',' ',$keyword->meta_keywords);
echo trim($msg); } ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?>
<?php if(!empty($keyword->meta_description)){
$descrip = preg_replace('/{{city}}/i',' ',$keyword->meta_description);
echo trim($descrip); } ?> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	 
    <div class="container">
        <div class="row">
            
          
            <div class="col-xs-12 col-sm-12 col-md-12 third-add-section">
                
                <?php  
                
               
                    if(!empty($keyword->child_banner)){
                    $cicons= unserialize($keyword->child_banner); 
                    if (!empty($cicons)) {
                    ?>
                    
                    <img loading="lazy" src="<?php echo e(asset(''.$cicons['child_banner']['src'])); ?>" alt="<?php echo e($cicons['child_banner']['name']); ?>">
                    
                    <?php  }else{ ?>
                    
                    <img loading="lazy" src="<?php echo asset('client/images/computer-courses-training.jpg'); ?>" alt="computer-courses-training">
                    <?php  } }else{
                        
                	if(!empty($keyword->category_banner)){
                    $cicons= unserialize($keyword->category_banner); 
                    if($cicons){
                    ?>
                    
                    <img loading="lazy" src="<?php echo e(asset(''.$cicons['category_banner']['src'])); ?>" alt="<?php echo e($cicons['category_banner']['name']); ?>">
                    
                    
                    <?php  } }else{  ?>
                    <img loading="lazy" src="<?php echo asset('client/images/computer-courses-training.jpg'); ?>" alt="computer-courses-training">
                    
                    <?php } } ?>
              
                
                
                
                
                </div>
        </div>
    </div>
<?php 

 
if(!empty($city)){ ?>
   <div class="clearfix"></div>   
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12 form-section">
            <div class="col-xs-9 col-sm-9 col-md-9 removeLeftSpace">
                <h1 class="hdTitle">
					<a href="<?php echo e(url('')); ?>/<?php if(!empty($city)) { echo $city; } ?>" title="<?php if(!empty($city)) { echo ucwords(str_replace("-"," ",$city)); } ?>">
					    <?php if(!empty($city)) { echo ucwords(str_replace("-"," ",$city)); } ?></a> 

						<?php if(!empty($city)): ?> 	 
						<?php
						$rating = 5;
						$stars = 'star_4.75_new.png';
						$ext = '.png'; 
						switch($rating){  
						case 0:
						$stars = 'star_1'.$ext;
						break;
						case 2:
						$stars = 'star_2'.$ext;
						break;
						case 3:
						$stars = 'star_3'.$ext;
						break;
						case 3.5:
						$stars = 'star_3.5_new'.$ext;
						break;
						case 4:
						$stars = 'star_4'.$ext;
						break;
						case 4.5:
						$stars = 'star_4.5_new'.$ext;
						break;
						case 4.75:
						$stars = 'star_4.75_new'.$ext;
						break;
						case 5:
						$stars = 'star_5_new'.$ext;
						break;
						}
						?>
				 
				 	<div itemscope itemtype="https://schema.org/Product" style="font-size: 12px;font-weight: 500;">
				<div class="text-primary" itemprop="name"></div>
				<div itemprop="aggregateRating"
				itemscope itemtype="https://schema.org/AggregateRating">
				<img loading="lazy" itemprop="image" src="<?php echo e(asset('client/images/'.$stars)); ?>"  alt="5 Star Rating: Very Good"/>
				<span itemprop="ratingValue"><?php   echo number_format((float) 5, 1, '.', '');   ?></span>
				out of <span itemprop="bestRating"></span>
				based on <span itemprop="ratingCount">656</span> ratings
				</div>    
				</div>
				
				 
        <?php endif; ?>
			 </h1>
            </div>
              <div class="removeRightSpace">
 				<div class="btn btn-primary common_popup_form top-btn">Send Enquiry</div>
			</div>
 
        </div>
	 
    </div>
    <div class="clearfix"></div>
    <script>
        $(document).ready(function() {
            $('.proceedBtn').click(function() {
                $('.proceedBtn').hide();
                $('.stopprocess').show();
                $('.formDiv').slideDown();
            });

            $('.stopprocess').click(function() {
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
             
			<?php if(isset($keyword) && null != $keyword->top_description): ?>
			<div class="col-xs-12 top_description" style="margin-top:20px;color:#033967">
			<h2>Top 
			<?php  if (!empty($keyword->keyword)) {
			$top_key = preg_replace('/{{city}}/i', strtoupper($city), $keyword->keyword);
			echo trim($top_key);
			} ?>					 
			</h2>
			<p title="<?php if (!empty($keyword->keyword)) {
			echo $keyword->keyword;
			} ?> in <?php echo e(Request::segment(1)); ?>"><?php  if (!empty($keyword->top_description)) {
			$keydescription = preg_replace('/{{city}}/i', ucfirst(Request::segment(1)), $keyword->top_description);
			echo trim($keydescription);
			} ?></p>
			</div>
			<?php endif; ?>


			<?php if(!empty($clientskeyword)): ?>
				<?php $n=0;?>
				<?php $__currentLoopData = $clientskeyword; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			
				<div class="col-sm-12 col-md-12 reviews-box-1 line-content">
				    <div class="client-list-first">
					<div class="col-sm-4 col-md-4 serchlist-img "><a href="<?php echo e(url('business-details')."/".$client->business_slug); ?>" title="<?php echo e($client->business_name); ?>">
						<?php if(null != $client->logo){
							$profilePic = unserialize($client->logo);
							?><img loading="lazy" src="<?php echo asset(''.$profilePic['large']['src']); ?>" alt="<?php echo e($client->business_name); ?>" title="<?php echo e($client->business_name); ?>" height="141" /><?php
						}else{
							?><img loading="lazy" src="<?php echo asset('client/images/default_pp_small.jpg'); ?>" alt="Business Logo" title="Business Logo" height="141" style="width:100%" /><?php
						}
						?>
						<?php if($client->client_type != 'FreeListing'): ?>
						<p><a href="#"><i class="fa fa-fw fa fa-thumbs-up serchlist-location-icon" aria-hidden="true"></i></a></p>
						<?php endif; ?>
						</a>
					</div>
					<div class="col-sm-6 col-md-6 aboutcomp">
				 
				 
						<a href="<?php echo e(url('business-details')."/".$client->business_slug); ?>" title="<?php echo e($client->business_name); ?>">
							<span class="serchlist-txt-1">
								<i class="fa fa-fw fa-university serchlist-icon" aria-hidden="true"></i>						 							
								<?php echo ucfirst(strtolower(substr($client->business_name,0,28)));?>  
							</span>
							<?php
								$badge = $client->sold_on_position;
							?>
						 
							 
						</a>
				 
						<div class="certified" <?php if($client->certified_status==1){ ?> style="background-image: url(../client/images/certified-icon.png);" <?php } ?>>
						 
						<?php
							$arr=[];
							if(!empty($client->address)){
								$arr['address'] = $client->address;
							}
							if(!empty($client->landmark)){
								$arr['landmark'] = $client->landmark;
							}
							if(!empty($client->city)){
								$arr['city'] = $client->city;
							}
							if(!empty($client->state)){
								$arr['state'] = $client->state;
							}
							if(!empty($client->country)){
								$arr['country'] = $client->country;
							}
							$addr = getAddress($arr,30);
							if($addr->ispositiveresponse){
							?>
								<div class="serchlist-txt">
									<i class="fa fa-fw fa fa-street-view icon" aria-hidden="true"></i>
									<?php if($addr->issubstr): ?>
										<a href="<?php echo e(url('business-details')."/".$client->business_slug); ?>"><?php echo e(ucfirst(strtolower($addr->substr))); ?></a>
										<a href="#" data-toggle="tooltip" data-placement="bottom" title="<?php echo e($addr->fullstr); ?>">more</a>
									<?php else: ?>
										<a href="<?php echo e(url('business-details')."/".$client->business_slug); ?>"><?php echo e(ucfirst(strtolower($addr->substr))); ?></a>
									<?php endif; ?>
								</div>
							<?php						
							}
						?>
						 
						 
						<div class="serchlist-txt"><i class="fa fa-fw fa-clock-o serchlist-icon" aria-hidden="true"></i>
							<a href="<?php echo e(url('business-details')."/".$client->business_slug); ?>" title="<?php echo e($client->business_name); ?>"><span class="serchlist-txt">
							<?php
							if(!empty($client->time)){
								$times = json_decode($client->time);
								$today =  strtolower(date('l'));
								echo "Opening Hrs (".$times->$today->from." - ".$times->$today->to.")";
							}else{
								echo "No working hours available";
							}
							?>
							</span></a>
						</div>
							<div class="serchlist-txt" >
							<i class="fa fa-fw fa fa-cog serchlist-icon" aria-hidden="true"></i>
							<span class="serchlist-txt">
								<div class="col-md-12 service-text" >
								<ul>
								<?php
								
						$assignedKwds = DB::table('assigned_kwds')
							  ->join('keyword','keyword.id','=','assigned_kwds.kw_id')
							  ->join('child_category','child_category.id','=','assigned_kwds.child_cat_id')
							  ->select('keyword.keyword','child_category.child_category as child_category_name')
							  ->where('assigned_kwds.client_id','=',$client->id)
							  ->limit(2)
							  ->get();
								$firstHalf = [];
								$secondHalf = [];
								$i = 1;
								$inPopupArr = [];
								foreach($assignedKwds as $assignedKwd){										 
								?>
								
								<li>
								<a href="<?php echo generate_slug($assignedKwd->keyword) ?>" title="<?php echo e($assignedKwd->keyword); ?>" class="keystore"><?php echo $assignedKwd->keyword; ?></a>
								</li>
											 <?php  }  ?>
							</ul>
									</div>
							
									 
							 </span>
						</div>
						</div>
					 
						<div class="serchlist-txt-btn"><a href="javascript:void(0);" title="<?php echo e($client->business_name); ?>" class="sms-view open-popup"><span>Enquiry Now</span></a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" title="<?php echo e($client->business_name); ?>" class="whatsapp-view open-popup"><span><i class="fa fa-whatsapp"></i> WhatsApp</span></a> &nbsp;&nbsp;&nbsp;<a href="<?php echo e(url('business-details')."/".$client->business_slug); ?>" title="<?php echo e($client->business_name); ?>" class="sms-view"><span>Vew Details</span></a></div>
					
					 
					</div>
					</div>
                    <div class="client-list-second" >
					<div class="col-sm-2 col-md-2 btnBox">
						<a href="<?php echo e(url('business-details')."/".$client->business_slug); ?>"><span class="serchlist-txt-1">User Rating</span></a>
						<div class="serchlist-txt">
							<?php
								if($client->comment_count>0){
									$avgRating = ($client->rating/(5*$client->comment_count))*5;
									$avgRating = number_format($avgRating, 1, '.', '');
									$whole = floor($avgRating);
									$fraction = $avgRating - $whole;
									$remain = 5-$whole;
									for($i=0;$i<$whole;++$i){
									 
										echo "<a href='".url('business-details')."/".$client->business_slug."' class='emptystar fullstar'></a>";
									}
									if($fraction>0&&$fraction<1){
								 
										echo "<a href='".url('business-details')."/".$client->business_slug."' class='emptystar halfstar'></a>";
										--$remain;
									}
									for($i=0;$i<$remain;++$i){
									 
										echo "<a href='".url('business-details')."/".$client->business_slug."' class='emptystar'></a>";
									}
								}else{
									$avgRating = 0.0;
									for($i=0;$i<5;++$i){
									 
										echo "<a href='".url('business-details')."/".$client->business_slug."' class='emptystar'></a>";
									}									
								}
							?>
					 
							<a href="<?php echo e(url('business-details')."/".$client->business_slug); ?>"><span class="serchlist-rating">(<?php echo e($avgRating or "0"); ?> Rating out of <?php echo e($client->comment_count or "0"); ?> Votes)</span></a>
						</div>
					<button class="serchlist-btn" title="Best Offer <?php echo e($client->business_name); ?>">Enquiry Now</button>
					</div>

					<div class="col-sm-12 col-md-12" style="padding-left:0;">
						<div class="clickBlick"><a href="<?php echo e(url('business-details').'/'.$client->business_slug); ?>" title="<?php echo e($client->business_name); ?>"><i class="fa fa-fw fa fa-sun-o" aria-hidden="true"></i></a><a href="<?php echo e(url('business-details').'/'.$client->business_slug); ?>" title="<?php echo e($client->business_name); ?>"><span>Click here to view your friend rating</span></a></div>
					</div>
					
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
				 
			
			 <ul id="pagin" ></ul>
<style>
.current .btn-info{
color: green;
}

#pagin li {
display: inline-block;
padding: 6px;
margin: 5px;
background-color: #C94A30; 
}

#pagin li a{
color: #fff;
}
</style>
 <script>
 
//Pagination
	pageSize = 10;
	var pageCount =  $(".line-content").length / pageSize;
    
     for(var i = 0 ; i<pageCount;i++){
        
       $("#pagin").append('<li><a href="#top">'+(i+1)+'</a></li> ');
     }
        $("#pagin li").first().find("a").addClass("current")
    showPage = function(page) {
	    $(".line-content").hide();
	    $(".line-content").each(function(n) {
	        if (n >= pageSize * (page - 1) && n < pageSize * page)
	            $(this).show();
	    });        
	}
    
	showPage(1);

	$("#pagin li a").click(function() {
	    $("#pagin li a").removeClass("current btn btn-info");
	    $(this).addClass("current btn btn-info");
	    showPage(parseInt($(this).text())) 
	});
	</script>
			
			
			 
        </div>
        
        
         <div class="col-sm-3 col-md-3 side-data reviews-box-1 rightsidedata">
    
 
 <?php echo $__env->make('client.layouts.common_sidebar_form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php 

        	$part_id= App\Models\ParentCategory::where('parent_slug',$keyword->parent_slug)->first();	 
		
		$subcategory= DB::table('child_category')
			->join('parent_category','child_category.parent_category_id','=','parent_category.id')		
			->where('parent_category_id',$part_id->id)
			->select('parent_category.*','child_category.*')
			->get();
        $rowCount =0; ?>
			<?php if(!empty($subcategory)): ?>
				<?php $__currentLoopData = $subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php $rowCount++; 
				
				if($rowCount <= count($clientskeyword)+ 1 ){ ?>
				
					<div class="side-row-1">
						<div class="side-data-txt-1">
						    
						   
					<a href="<?php echo e(url(strtolower($city).'/categories/'.$child->parent_slug.'/'.$child->child_slug)); ?>" title="<?php if(!empty($child->child_category)){  echo $child->child_category; } ?>" target="_blank"><?php if(!empty($child->child_category)){  echo $child->child_category; } ?></a>
						
					
						
						
						</div>
						 <div class="side-txt">
						  <span class="expert-count"><?php 	$assignKeyword = DB::table('keyword')->where('child_category_id', $child->id)->count(); 
						  if($assignKeyword){
							  echo $assignKeyword;
						  }else{
						      
						      echo "342";
						  }
							  
							  ?>+ </span>Experts Available	
						</div> 
							
							<div class="btn btn-primary side-data-btn">Expert Advice</div>	 
				 	
					</div>		 
				
					<hr>
					<?php } ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
				
	  
        </div>
         
    </div>
    
 
 
	<?php if(!empty($reviewsClientsList)): ?>
	<div class="container">
	 <div class="col-sm-12 col-md-12"> 		
			<?php $__currentLoopData = $reviewsClientsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			 <div class="col-sm-3 col-md-3 ">
			 <div class="reviews-client-box">
					<div class="side-row-1">
						<div class="side-data-txt-1"><a href="<?php echo e(url('training')."/".$client->business_slug); ?>" title="<?php echo e($client->business_name); ?>"><span><?php echo e($client->business_name); ?></span></a></div>
						<div class="side-txt">
							<?php
								$badge = $client->sold_on_position;
							?>
							<img loading="lazy" src="<?php echo asset('client/images/'.$badge.'.png'); ?>" alt="<?php echo e($client->business_name); ?>" title="<?php echo e($client->business_name); ?>">
						</div>
					</div>

					<div class="clearfix"></div>

					<div class="serchlist-txt">
						<?php
							if($client->comment_count>0){
								$avgRating = ($client->rating/(5*$client->comment_count))*5;
								$avgRating = number_format($avgRating, 1, '.', '');
								$whole = floor($avgRating);
								$fraction = $avgRating - $whole;
								$remain = 5-$whole;
								for($i=0;$i<$whole;++$i){
							
									echo "<a href='".url('training')."/".$client->business_slug."' class='emptystar fullstar'></a>";
								}
								if($fraction>0&&$fraction<1){
								
									echo "<a href='".url('training')."/".$client->business_slug."' class='emptystar halfstar'></a>";
									--$remain;
								}
								for($i=0;$i<$remain;++$i){
								
									echo "<a href='".url('training')."/".$client->business_slug."' class='emptystar'></a>";
								}
							}else{
								$avgRating = 0.0;
								for($i=0;$i<5;++$i){
								
									echo "<a href='".url('training')."/".$client->business_slug."' class='emptystar'></a>";
								}									
							}
						?>
						<a href="<?php echo e(url('training')."/".$client->business_slug); ?>"><span class="serchlist-rating"><?php echo e($client->comment_count or "0"); ?> Reviews </span></a></div>
						<!--<?php
							$arr=[];
							if(!empty($client->address)){
								$arr['address'] = $client->address;
							}
							if(!empty($client->landmark)){
								$arr['landmark'] = $client->landmark;
							}
							if(!empty($client->city)){
								$arr['city'] = $client->city;
							}
							if(!empty($client->state)){
								$arr['state'] = $client->state;
							}
							if(!empty($client->country)){
								$arr['country'] = $client->country;
							}
							$addr = getAddress($arr,100);
							if($addr->ispositiveresponse){
							?>
								<div class="serchlist-txt side-data-add">
									<?php if($addr->issubstr): ?>
										<a href="<?php echo e(url('training')."/".$client->business_slug); ?>"><?php echo e($addr->substr); ?></a>
										<a href="<?php echo e(url('training')."/".$client->business_slug); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo e($addr->fullstr); ?>">more</a>
									<?php else: ?>
										<a href="<?php echo e(url('training')."/".$client->business_slug); ?>"><?php echo e($addr->substr); ?></a>
									<?php endif; ?>
								</div>
							<?php						
							}
						?>-->
							<p><?php echo ucfirst(substr($client->comment_content,0,200));?></p>
					<!--<div class="btn btn-primary side-data-btn">Send SMS To Business</div>-->
				 
					  </div>
					  </div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
  
	 </div>
	 
	 
		<?php if(!empty($keyword->bottom_description)): ?>
		<div class="container"> 		 
		<div class="category-description">  
		<h4><?php  if(!empty($keyword->keyword)){ echo $keyword->keyword; } ?></h4>
		<p title="<?php if(!empty($keyword->keyword)) { echo $keyword->keyword; } ?> in India"><?php  if(!empty($keyword->bottom_description)){
		$keydescription = preg_replace('/{{city}}/i','India',$keyword->bottom_description);
		echo trim($keydescription); } ?></p>	 
		</div>
		
		 
		</div>
		<?php endif; ?>
	</div>    
	 <?php endif; ?>
	 
	 <?php if(!empty($keyword->faqq1)): ?>
		<div class="container"> 		 
		<div class="category-description">  
		<h4>FAQ:- <?php  if(!empty($keyword->keyword)){ 
		
		$key = preg_replace('/{{city}}/i',strtoupper($city),$keyword->keyword); echo trim($key); } ?> </h4> 
			<div itemscope itemtype="https://schema.org/FAQPage">
			<?php if(!empty($keyword->faqq1)){ ?>
			<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
			<h5 itemprop="name"><strong><?php  if(!empty($keyword->faqq1)){
			$faqq1 = preg_replace('/{{city}}/i',ucfirst(Request::segment(1)),$keyword->faqq1);
			echo trim($faqq1); } ?>?</strong></h5>
			<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="display: block;">
			<div itemprop="text">
			<?php  if(!empty($keyword->faqa1)){
			$faqa1 = preg_replace('/{{city}}/i',ucfirst(Request::segment(1)),$keyword->faqa1);
			echo trim($faqa1); } ?>
			 

			</div>
			</div>
			</div>
			<?php } ?>


			<?php if(!empty($keyword->faqq2)){ ?>
			<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
			<h5 itemprop="name"><strong><?php  if(!empty($keyword->faqq2)){
			$faqq2 = preg_replace('/{{city}}/i',ucfirst(Request::segment(1)),$keyword->faqq2);
			echo trim($faqq2); } ?>?</strong></h5>
			<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
			<div itemprop="text">
			<?php  if(!empty($keyword->faqa2)){
			$faqa2 = preg_replace('/{{city}}/i',ucfirst(Request::segment(1)),$keyword->faqa2);
			echo trim($faqa2); } ?>
		 
			</div>
			</div>
			</div>
			<?php } ?>		
			<?php if(!empty($keyword->faqq3)){ ?>
			<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
			<h5 itemprop="name"><strong><?php  if(!empty($keyword->faqq3)){
			$faqq3 = preg_replace('/{{city}}/i',ucfirst(Request::segment(1)),$keyword->faqq3);
			echo trim($faqq3); } ?>?</strong></h5>
			<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
			<div itemprop="text">
			<?php  if(!empty($keyword->faqa3)){
			$faqa3 = preg_replace('/{{city}}/i',ucfirst(Request::segment(1)),$keyword->faqa3);
			echo trim($faqa3); } ?>
			 
			</div>
			</div>
			</div>
			<?php } ?>		
			<?php if(!empty($keyword->faqq4)){ ?>
			<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
			<h5 itemprop="name"><strong><?php  if(!empty($keyword->faqq4)){
			$faqq4 = preg_replace('/{{city}}/i',ucfirst(Request::segment(1)),$keyword->faqq4);
			echo trim($faqq4); } ?>?</strong></h5>
			<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
			<div itemprop="text">
			<?php  if(!empty($keyword->faqa4)){
			$faqa4 = preg_replace('/{{city}}/i',ucfirst(Request::segment(1)),$keyword->faqa4);
			echo trim($faqa4); } ?>
			 
			</div>
			</div>
			</div>
			<?php } ?>		
			<?php if(!empty($keyword->faqq5)){ ?>
			<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
			<h5 itemprop="name"><strong><?php  if(!empty($keyword->faqq5)){
			$faqq5 = preg_replace('/{{city}}/i',ucfirst(Request::segment(1)),$keyword->faqq5);
			echo trim($faqq5); } ?>?</strong></h5>
			<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
			<div itemprop="text">
			<?php  if(!empty($keyword->faqa5)){
			$faqa5 = preg_replace('/{{city}}/i',ucfirst(Request::segment(1)),$keyword->faqa5);
			echo trim($faqa5); } ?>
		 
			</div>
			</div>
			</div>
			<?php } ?>


			</div>
		
		</div>
		
		 
		</div>
		<?php endif; ?>
      <?php if(!empty($keyword)): ?>
      <div class="container">
	  <div class="category-box">
	   <div class="course-program">
	     <h4>Find <?php if(!empty($city)) { echo ucwords(str_replace("-"," ",$city)); } ?> other Location</h4>
	   	<ul class="">		
		<?php if(!empty($cities)): ?>
			<?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $citys): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	   <li class="col-sm-3 col-md-3"><a href="<?php echo e(url(strtolower($citys->city))); ?>/<?php if(!empty($city)) { echo $city; } ?>"  title="<?php if(!empty($city)) { echo ucwords(str_replace("-"," ",$city)); } ?> in <?php echo e($citys->city); ?>"><?php if(!empty($city)): ?><?php echo ucwords(str_replace("-"," ",$city)); ?><?php endif; ?> in <?php echo e($citys->city); ?></a></li>	   
	   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	   <?php endif; ?>
	    
	   </ul>
	   </div>
	 </div>
	 </div>
      <?php endif; ?>
	  
	  
	   <div class="clearfix"></div>
	 <br>
	 
	 
		  
      <div class="container">
	    
	  <div class="category-box">
	   <div class="course-program">
	    
	   <h5>Find Services Related to  </h5>
	   	<ul class="">		
		<?php if(!empty($keywordlist)): ?>
			<?php $__currentLoopData = $keywordlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keywords): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	   <li class="col-sm-3 col-md-3"><a href="<?php echo e(url('/')); ?>/<?php echo generate_slug($keywords->child_slug) ?>" title="<?php if(!empty($keywords->child_category)) { echo $keywords->child_category; } ?> "><?php echo e($keywords->child_category); ?></a></li>
	   
	   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	   <?php endif; ?>
	   </ul>
	   </div>
	 </div>
	 
	  
	 </div>
     
	  
	   <div class="container">
        <div class="clearfix"></div>
        <h2 class="title">Our  <span>Business Services</a></span> </h2>
       <br>
	   <div class="category-box">
	   <div class="business-services">
	       	<?php if(!empty($parentCategories)): ?>
				<?php $i=0; ?>
			<?php $__currentLoopData = $parentCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
	        <div class="sk-collapse">
                <div sulevent="toggleSkGroup" class="sk-group show" hasevent="true">
                    <div class="sk-label">
                        <h3 class="title"><?php echo e($parent->parent_category); ?></h3>
                        <svg class="icon down-chevron" width="12" height="7.41">
                            <use xlink:href="#skIconDownChevron"></use>
                        </svg>
                    </div>
                    <div class="sk-data">
                        <ul class="content-list intent">
                            <?php   $childCategories = App\ChildCategory::where('parent_category_id',$parent->id)->get();
                            if(!empty($childCategories)){
                                foreach($childCategories as $child){
                            ?>
                        <li><a href="<?php echo e(url($child->child_slug)); ?>" tabindex="0" target="_blank"><?php echo e($child->child_category); ?></a></li> 
                                      <?php } } ?>  
                        </ul>
                    </div>
                </div>
        </div>
        
        
          	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
         
	       
	    
            
	 
	   </div>
	   </div>
        <div class="clearfix"></div>
    </div>
	  
      <?php }else{ ?>
	  
	     
			<div class="container">
			 
			<div class="row">
			<div class="col-sm-12 col-md-12 banner-details">
			<h4 class="Oops-txt">Oops! No Result Found </h5>
			<h2 class="error-txt"></h2>
			</div>
			</div>
			 
			</div>
 <div class="clearfix"></div>
    <div class="container">
	 
	  <div class="add-section">
	   <div class="col-xs-12"> 				
			 
		<?php if(!empty($clientLists)): ?>
			<?php foreach($clientLists as $client):
				$image = '';
				if($client->logo!=''):
					$image = unserialize($client->logo);
					$image = $image['large']['src'];
					$imagename = $image['large']['name'];
				
			?>
			
				<div class="col-md-3">
				<div class="inner-client-div">
			 
				<figure><img loading="lazy" class="" src="<?php echo url($image); ?>" style="width:100%;" alt="<?php if($imagename){ echo $imagename; } ?>"></figure>
				<div class="grid-info">
					<h3><a href="<?php echo e(url('training').'/'.generate_slug($client->business_slug)); ?>" title="<?php echo e($client->business_name); ?>" tabindex="0"><div title="<?php echo e($client->business_name); ?>"><strong><?php echo e($client->business_name); ?></strong></div></a></h3>
				
					<strong><?php echo e(ucfirst($client->city)); ?></strong>
					<a href="<?php echo e(url('training').'/'.generate_slug($client->business_slug)); ?>" class="get-quotes" tabindex="0">View</a>
				</div>
				</div></div>
				
				
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
    <div class="bestDealpopup">
        <a href="javascript:void(0);" class="dealclosebtn">&nbsp;</a>
		  <h4>Need Expert Advice ?</h4>
        <div class="jbt"> Fill this form and get best deals from "<span class="orng"><?php if(!empty($keyword->keyword)): ?><?php echo $keyword->keyword; ?><?php endif; ?></span>"</div>
        <div class="bdc">
            <form class="form-inline" action="" method="post" onsubmit="return homeController.saveEnquiry(this)">
                <aside>
				<?php echo e(csrf_field()); ?>

                    <p><label for="yn">Your Name <span>*</span></label>
						<input type="hidden" name="lead_form_" value="1" />
						<input type="hidden" name="kw_text" value="<?php if(!empty($keyword->keyword)): ?><?php echo $keyword->keyword; ?><?php endif; ?>" />
						<input type="hidden" name="city_id" value="noida" />
                        <input class="jinp" type="text" placeholder="Enter Full Name" name="name" value="">
						<input type="hidden" name="from_page" value="<?php echo e(request()->path()); ?>">
                    </p>
                    <p>
                        <label for="ymn">Your Mobile <span>*</span></label>
                        <input class="jinp" type="tel" placeholder="Enter Mobile" name="mobile" value="">
                    </p>
                    <p>
                        <label for="yei">Your Email ID <span></span></label>
                        <input class="jinp" type="text" placeholder="Enter Email" name="email" value="">
                    </p>
                    <p>
                        <label class="moblab">&nbsp;</label>
						<input class="jbtn" type="submit" value="Submit" />
						<input type="reset" class="reset_lead_form hide" value="reset" />
                        <!--button type="button" class="jbtn">Submit</button-->
                    </p>
                </aside>
            </form>
        </div>

        <section class="bdn">
            <aside class="jpb">
                <p>
                    <span class="bul"></span> Your requirement is sent to the selected relevant businesses
                </p>
                <p>
                    <span class="bul"></span> Businesses compete with each other to get you the Best Deal </p>
                <p>
                    <span class="bul"></span> You choose whichever suits you best
                </p>
                <p>
                    <span class="bul"></span> Contact Info sent to you by SMS/Email
                </p>
            </aside>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/quickdials/public_html/resources/views/client/childKeyword.blade.php ENDPATH**/ ?>