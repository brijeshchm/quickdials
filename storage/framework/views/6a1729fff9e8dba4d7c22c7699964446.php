<?php $__env->startSection('title'); ?>
Quick Dials-  Oops !Page Not Found
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('keyword'); ?>
Quick Dials- Oops !Page Not Found
<?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?>
Quick Dials-  Oops !Page Not Found
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	
<div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 third-add-section"><img loading="lazy" src="<?php echo asset('client/images/thirdAdd.jpg'); ?>" alt="thirdAdd"></div>
        </div>
</div> 
<div class="container">

			
			 <div class="row">
                <div class="col-sm-12 col-md-12 banner-details">
				<h4 class="Oops-txt">Oops! Page Not Found </h5>				 
				  <h2 class="error-txt"><a href="<?php echo e(url('/')); ?>">Home</a></h2>
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
				
			?>
			
				<div class="col-md-3">
				<div class="inner-client-div">
			 
				<figure><img loading="lazy" class="" src="<?php echo url(''.$image); ?>" style="width:100%;"></figure>
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
               
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/quickdials/public_html/resources/views/client/errorpage.blade.php ENDPATH**/ ?>