@extends('client.layouts.app')
@section('title')
Quickdials- Institute list
@endsection 
@section('keyword')
Quickdials- Institute list
@endsection
@section('description')
Quickdials- Institute list
@endsection
@section('content')	
 
    <div class="container">
        <div class="clearfix"></div>
        <h2 class="title">Our Valued <span>Client Categories </span></h2>
        <div class="clientBlock">
		
		<?php if(count($clientCategories)>0): ?>
			<?php foreach($clientCategories as $clientCategory):
				$image = '';
				if($clientCategory->image!=''):
					$image = unserialize($clientCategory->image);
					$image = $image['large']['src'];
				endif;
			?>
				<div class="col-md-3"><div class="inner-client-div">
				<figure><img loading="lazy" class="" src="<?php echo url($image); ?>"></figure>
				<div class="grid-info">
					<h3><span><abbr title="{{$clientCategory->name}}"><b>{{$clientCategory->name}}</b></abbr></span></h3>
					<span>501 verified partners</span>
					<a href="{{url('business-details/'.$clientCategory->business_slug)}}" class="get-quotes" tabindex="0">View All</a>
				</div>
				</div></div>
			<?php endforeach; ?>
		<?php endif; ?>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection