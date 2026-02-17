@extends('client.layouts.app')
@section('title')
@if(!empty($keyword->meta_title))	
<?php   
$key = preg_replace('/in {{city}}/i','',$keyword->meta_title);
echo trim($key);   ?>
@else
	@if(!empty($keyword->parent_category)){!!$keyword->parent_category!!}@endif  

@endif
@endsection 
@section('keyword')
<?php if(!empty($keyword->meta_keywords)){
$msg = preg_replace('/in {{city}}/i',' ',$keyword->meta_keywords);
echo trim($msg); } ?>
@endsection
@section('description')
<?php if(!empty($keyword->meta_description)){
$descrip = preg_replace('/{{city}}/i',' ',$keyword->meta_description);
echo trim($descrip); } ?> 
@endsection
@section('content')	

 
	<style>
		.inner-client-div .grid-info h3{
			height:auto;
		}
		.inner-client-div .grid-info .get-quotes{
			margin-top:-25px;
		}
		.font-11{
			font-size:11px;
		}
		.course-program ul li {
        	border: 0.5px solid#ccc;
            padding: 12px 14px;
            text-align: center;
            margin: 5px 0px 24px 70px;
            display: inline-flex;
            grid-gap: 46px 106px;
            box-shadow: 0 0 10px 0 #e3e3e3;
		    
		}
		.course-program ul li:hover{ background: linear-gradient(180deg, #ecf4f3, #f1f5f5)
		  }
	</style>
	
	<div class="container">
        <div class="row"> 
            <div class="col-xs-12 col-sm-12 col-md-12 third-add-section">
        
                  <?php  
                     
                    if(!empty($keyword->child_banner)){
                    $cicons= unserialize($keyword->child_banner); 
                    if (!empty($cicons)) {
                    ?>
                    
                    <img loading="lazy" src="{{asset(''.$cicons['child_banner']['src'])}}" alt="{{$cicons['child_banner']['name']}}">
                    
                    <?php  }else{ ?>
                    
                    <img loading="lazy" src="<?php echo asset('client/images/computer-courses-training.jpg'); ?>" alt="computer-courses-training">
                    <?php  } }else{ 
                        
                        if(!empty($keyword->category_banner)){
                    $cicons= unserialize($keyword->category_banner); 
                    if($cicons){
                    ?>
                    
                    <img loading="lazy" src="{{asset(''.$cicons['category_banner']['src'])}}" alt="{{$cicons['category_banner']['name']}}">
                    
                    
                    <?php  } }else{  ?>
                    <img loading="lazy" src="<?php echo asset('client/images/computer-courses-training.jpg'); ?>" alt="computer-courses-training" >
                    
                    <?php } } ?>  
                
                </div>
        </div>
    </div>
 

<div class="container">
        <div class=" form-section">
            <div class=" removeLeftSpace">
                <div class="hdTitle">				 
					
                        @if(!empty($keyword)) 	 
                        <?php
                        $rating = $keyword->ratingvalue;
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
				<div class="text-primary" itemprop="name"><h1><?php if(!empty($keyword->parent_category)) { echo $keyword->parent_category; } ?></h1></div>
				<div itemprop="aggregateRating"
				itemscope itemtype="https://schema.org/AggregateRating">
				<img loading="lazy" itemprop="image" src="{{ asset('client/images/'.$stars) }}"  alt="{{$stars}}"/>
				<span itemprop="ratingValue"><?php if(!empty($keyword->ratingvalue)) { echo number_format((float)$keyword->ratingvalue, 1, '.', '');  }else{ echo "1.0"; } ?></span>
				out of <span itemprop="bestRating"></span>
				based on <span itemprop="ratingCount">{{$keyword->ratingcount or ""}}</span> ratings
				</div>    
				</div>
				<div class="keyword-cotegory-text">	 			
		
			 <a href="{{url('categories/')}}/<?php if(!empty($keyword->parent_category)) { echo generate_slug($keyword->parent_category); } ?>" >Categories / <?php if(!empty($keyword->parent_category)) { echo $keyword->parent_category; } ?></a> 

			 </div>
					 
@endif
					</div>
            </div>
              
 
        </div>
       
	 
    </div>
   
    
	   
	    <div class="container">
      
  <div class="col-sm-9 col-md-9 reviews-box-main mainContainer">
        @if(isset($keyword) && null!=$keyword->top_description)
		<div class="col-xs-12 top_description" style="margin-top:20px;color:#033967">	
			
		<h2>Top 
		<?php 
	 
		if (!empty($keyword->parent_category)) {
		$top_key = preg_replace('/{{city}}/i', strtoupper($city), $keyword->parent_category);
		echo trim($top_key);
		} ?>					 
		</h2>
		<p title="<?php if(!empty($keyword->parent_category)) { echo $keyword->parent_category; } ?> in {{Request::segment(1)}}"><?php  if(!empty($keyword->top_description)){
		$keydescription = preg_replace('/{{city}}/i',ucfirst(Request::segment(1)),$keyword->top_description);
		echo trim($keydescription); } ?></p> 
		</div>
		@endif
       
        <div class="category-box">
	   <div class="business-services">
	   	<ul class="content-list intent">	
	   	
	    
		@if(!empty($businessServices))
			@foreach($businessServices as $parent)
 
	<li class=""><?php  if(!empty($parent->pc_icon)){
		$cicons= unserialize($parent->pc_icon); 
		if (!empty($cicons)) {
		?>
		
		<img loading="lazy" src="{{asset(''.$cicons['pc_icon']['src'])}}" alt="{{ $cicons['pc_icon']['name'] }}" style="width:30px" >
		
		<?php  }else{ ?>
		
		<img loading="lazy" src="<?php echo asset('images/it-training.png'); ?>" alt="it-training" >
		<?php  } } ?><a href="{{url('/child/'.$parent->child_slug)}}" title="<?php if(!empty($parent->child_category)){  echo $parent->child_category; } ?>" ><?php if(!empty($parent->child_category)){  echo $parent->child_category; } ?></a> </li>
	   
	   @endforeach
	   @endif
	   
	   </ul>
	   </div>
	   </div>

	   </div>

	    <div class="col-sm-3 col-md-3 side-data reviews-box-1 rightsidedata"> 
			
		@include('client.layouts.common_sidebar_form')

		<div class="side-data-txt">
			<p>Featured Service Advertising</p>
			</div>
			<div class="side-row-1">
			<img loading="lazy" src="<?php echo asset('landing/img/ads1.png'); ?>" alt="advertise" title="advertise">
		</div>

        </div>
  
	   </div>
	   
	  
	  
	  
	   
	   	@if(!empty($keyword->faqq1))
		<div class="container"> 		 
		<div class="category-description">  
		<h4>FAQ:- <?php  if(!empty($keyword->parent_category)){ echo $keyword->parent_category; } ?> </h4> 
			<div itemscope itemtype="https://schema.org/FAQPage">
			<?php if(!empty($keyword->faqq1)){ ?>
			<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
			<h5 itemprop="name"><strong><?php  if(!empty($keyword->faqq1)){
			echo $keyword->faqq1;  } ?>?</strong></h5>
			<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" style="display: block;">
			<div itemprop="text">
			<?php  if(!empty($keyword->faqa1)){
			echo $keyword->faqa1;
			  } ?>
			 

			</div>
			</div>
			</div>
			<?php } ?>


			<?php if(!empty($keyword->faqq2)){ ?>
			<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
			<h5 itemprop="name"><strong><?php  if(!empty($keyword->faqq2)){
		echo $keyword->faqq2; } ?>?</strong></h5>
			<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
			<div itemprop="text">
			<?php  if(!empty($keyword->faqa2)){
			echo $keyword->faqa2;
			 } ?>
		 
			</div>
			</div>
			</div>
			<?php } ?>		
			<?php if(!empty($keyword->faqq3)){ ?>
			<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
			<h5 itemprop="name"><strong><?php  if(!empty($keyword->faqq3)){
			echo $keyword->faqq3;
		     } ?>?</strong></h5>
			<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
			<div itemprop="text">
			<?php  if(!empty($keyword->faqa3)){
		echo $keyword->faqa3;
			 } ?>
			 
			</div>
			</div>
			</div>
			<?php } ?>		
			<?php if(!empty($keyword->faqq4)){ ?>
			<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
			<h5 itemprop="name"><strong><?php  if(!empty($keyword->faqq4)){
			echo $keyword->faqq4;
		         } ?>?</strong></h5>
			<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
			<div itemprop="text">
			<?php  if(!empty($keyword->faqa4)){
			echo $keyword->faqa4;
		  } ?>
			 
			</div>
			</div>
			</div>
			<?php } ?>		
			<?php if(!empty($keyword->faqq5)){ ?>
			<div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
			<h5 itemprop="name"><strong><?php  if(!empty($keyword->faqq5)){
			echo $keyword->faqq5;
			 } ?>?</strong></h5>
			<div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
			<div itemprop="text">
			<?php  if(!empty($keyword->faqa5)){
			echo $keyword->faqa5;
			 } ?>
		 
			</div>
			</div>
			</div>
			<?php } ?>


			</div>
		
		</div>
		
		 
		</div>
		@endif  
	 
      @if(!empty($keyword->bottom_description))
		<div class="container"> 		 
		<disv class="category-description">  			
		
		<?php  if(!empty($keyword->bottom_description)){
		$keydescription = preg_replace('/{{city}}/i',ucwords(str_replace("-", " ", Request::segment(1))),$keyword->bottom_description);
		echo trim($keydescription); } ?>	 
		</div>
		
		 
		</div>
		@endif
    </div>
    
       	  
<div class="inquiry-popup"></div>

    <div class="bestDealpopup"> 
		 
        <a href="javascript:void(0);" class="dealclosebtn">&nbsp;</a> 

	   <h4>Need Expert Advice </h4>
        <div class="jbt"> Fill this form to Grab the best Deals on "<span class="orng"><?php if($keyword->parent_category){ echo $keyword->parent_category; } ?></span>"</div>
        <div class="bdc">
             
            <form class="form-inline" action="" method="post" onsubmit="return homeController.saveEnquiry(this)">
                <aside>
			 
                    <p><label for="yn">Your Name <span>*</span></label>
						<input type="hidden" name="lead_form" value="1" />
						<input type="hidden" name="kw_text" value="<?php echo $keyword->parent_category; ?>" />
						<input type="hidden" name="city_id" class="cityList" value="" />
                        <input class="jinp" type="text" placeholder="Enter Full Name" name="name" value="">
						<input type="hidden" name="from_page" value="{{ request()->path() }}">
                    </p>
                    <p>
                        <label for="ymn">Your Mobile<span>*</span></label>
                        <input class="jinp" type="tel" placeholder="Enter Mobile" name="mobile" value="">
                    </p>
                    <p>
                        <label for="yei">Your Email ID <span></span></label>
                        <input class="jinp" type="text" placeholder="Enter Email" name="email" value="">
                    </p>
                    <p>
                        <label class="moblab">&nbsp;</label>
					 
						<input class="jbtn" type="submit" name="submit" value="Submit" />
						<input type="reset" class="reset_lead_form hide" value="reset" />
                         
                    </p>
                </aside>
            </form>
        </div>

        <section class="bdn">
            <aside class="jpb">
                <p>
                    <span class="bul"></span>Your number will be shared only to these experts
                </p>
                <p>
                    <span class="bul"></span> Get Free Expert Online Counseling</p>
                <p>
                    <span class="bul"></span> Get Free Demo Classes
                </p>
                <p>
                    <span class="bul"></span> Get Fees & Discounts
                </p>
            </aside>
        </section>
    </div>
@endsection