 


<?php $__env->startSection('title'); ?>
     Blog  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('public/official/css/style.css')); ?>" rel="stylesheet">
<div class="about-bg page-hearder-area">
    <div class="official-overly"></div> 
  </div>  
  <!-- END Header -->
  
  <style>
 .single-blog-img img{
	height: 350px;
    width: 850px;
 }
 </style>
  <div class="blog-page area-padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
          <div class="page-head-blog">
            <div class="single-blog-page">
              <!-- search option start -->
             
              <!-- search option end -->
            </div>
            <div class="single-blog-page">
              <!-- recent start -->
              <div class="left-blog">
                <h4>recent post</h4>
                <div class="recent-post">
                  <!-- start single post -->
				  
                       <?php if(!empty($blogrecents)): ?>
					 <?php $__currentLoopData = $blogrecents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blogrecent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php 
						if($blogrecent->image!=''){
						$image = unserialize($blogrecent->image);
						//$image = $image['thumbnail']['src'];
						$image = $image['large']['src'];
						}
						?>
				  <div class="recent-single-post">
                    <div class="post-img">
					<a href="<?php echo e(url('blog/'.$blogrecent->slug)); ?>">
					  <img loading="lazy" src="<?php echo (isset($image)?asset($image):"");  ?>" width="96px" height="72px" title="<?php echo e($blogrecent->name); ?>" alt="<?php echo e($blogrecent->name); ?>">
					</a>
                    </div>
                    <div class="pst-content">
                      <p><a href="<?php echo e(url('blog/'.$blogrecent->slug)); ?>"><?php echo ucfirst($blogrecent->title);?> .</a></p>
                    </div>
                  </div>
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  <?php endif; ?>
                
                  <!-- End single post -->
                </div>
              </div>
              <!-- recent end -->
            </div>
             
          </div>
        </div>
        <!-- End left sidebar -->
        <!-- Start single blog -->
        <div class="col-md-8 col-sm-8 col-xs-12">
          <div class="row">
           <?php if(!empty($bloglist)): ?>
					 <?php $__currentLoopData = $bloglist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php 
						if($blog->image!=''){
						$image = unserialize($blog->image);
						//$image = $image['thumbnail']['src'];
						$image = $image['large']['src'];
						}
						?>
		  <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="single-blog">
                <div class="single-blog-img">
                  <a href="<?php echo e(url('blog/'.$blog->slug)); ?>">
					  <img loading="lazy" src="<?php echo (isset($image)?asset($image):"");  ?>" title="<?php echo e($blog->name); ?>" alt="<?php echo e($blog->name); ?>">
				</a>
                </div>
                <div class="blog-meta">
				 
					<span class="date-type">
					<i class="fa fa-calendar"></i><?php echo date('M, d Y',strtotime($blog->created_at)); ?>
					</span>
					</div>
					<div class="blog-text">
					<h4>
					<a href="<?php echo e(url('blog/'.$blog->slug)); ?>"><?php echo e($blog->title); ?></a>
					</h4>
                  <p>
                   <?php echo ucfirst(substr($blog->description,0,220));?>
				    
                  </p>
                </div>
                <span>
					<a href="<?php echo e(url('blog/'.$blog->slug)); ?>" class="ready-btn">Read more</a>
				</span>
              </div>
            </div>
			  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				  <?php endif; ?>
				  <?php echo e($bloglist->links()); ?>

		 
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Blog Area -->

  <div class="clearfix"></div>
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('client.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/quickdials/public_html/resources/views/official/blog.blade.php ENDPATH**/ ?>