<?php $__env->startSection('title'); ?>
Quick Dials Dashboard
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('keyword'); ?>
Find Best It Training Centre near You, Find Best It Training Institute near You, Find Top 10 IT Training Institute near You, Find Best Entrance Exam Preparation Centre Near you, Top 10 Entrance Exam Centre Near you, Find Best Distance Education Centre Near You, Find Top 10 Distance Education Centre Near You, Find Best School And Colleges Near You, Find Top 10 school And College Near You, Get Education Loan, GET Free career Counselling, Find Best overseas education consultants Near you, Find Top 10 overseas education consultants Near you

<?php $__env->stopSection(); ?>
<?php $__env->startSection('description'); ?>
Find Only Certified Training Institutes, Coaching Centers near you on Estivaledge and Get Free counseling, Free Demo Classes, and Get Placement Assistence.
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	
 
  <main id="main" class="main">
<style>
.lead-dashboard{
    display:flex;
}
.align-items-center{
    margin-left:10px;
}

.lead.enquiry-item{
background-color: #ffffff;
    padding: 15px;
    border-radius: 5px;
}

 
</style>
   

     <div class="dashboard">
          
        <div class="cards">
            <div class="card">
                <h3>Archived Enquiry</h3>
                <p><a href="<?php echo e(url('business/enquiry')); ?>"><?php echo count($leads); ?> Lead</a></p>
            </div>
            <div class="card">
                <h3>Remaining Coins</h3>
                <p class="coins">
                 <i class="bi bi-currency-rupee"></i> <?php  if($clientDetails->coins_amt) { echo $clientDetails->coins_amt; } ?> 
                </p>
            </div>
        </div>
        
          <?php if(!empty($leads)): ?> 
            <?php $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php //echo "<pre>";print_r($lead); ?>
        <div class="lead-details ">
            <div class="lead enquiry-item">
                <div class="img-cls">
                  <i class="fa fa-uaser"></i> <?php  echo ucfirst(substr($lead->name,0,1)); ?>
                </div>
                <div class="info enquiry-details">
                    <h4><i class="bi bi-person"></i> <?php echo e(ucfirst($lead->name)); ?> 
                
                 <i class="bi bi-coin"></i> 
                <?php    $coins= "";
                if(!empty($lead->scrapLead)) { 
                $coins =    "<span style='color:green'>" . $lead->coins . "</span>"; 
                }else if($lead->coins){ 
                $coins =  "<span style='color:red;'> -" . $lead->coins . " </span>"; 
                }  
                echo $coins;
                ?>
                </h4>

                    <p><span class="icon" >
                      <i class="bi bi-clock"></i>
                    <?php  get_time(strtotime($lead->created)); ?> ago</span></p>
                    <p><i class="bi bi-book"></i>  <?php echo e($lead->kw_text); ?></p>
                     <div class="details-section">
                    <div class="title">Enquired for <strong><?php echo e($lead->kw_text); ?></strong> Send price and other details.</div>
                    <div class="source"><?php if($lead->email): ?> <i class="bi bi-envelope"></i><?php echo e($lead->email); ?><?php endif; ?></div>
                     <p> </p>
                </div>
                <div class="show-details" onclick="toggleDetails(this)">Show details</div>
                </div>
                
                <div class="map">
                    <h4><?php if($lead->city_name): ?><i class="bi bi-pin-map-fill"></i> <?php echo e($lead->city_name); ?><?php endif; ?></h4>
                    <p><?php if($lead->zone): ?><i class="bi bi-pin-map-fill"></i> <?php echo e($lead->zone); ?> <?php endif; ?></p>
                    <!-- <p>R Programming Training</p> -->
                </div>
                <div class="contact">
                    <i class="bi bi-telephone-fill"></i><a href="tel:91<?php echo e($lead->mobile); ?>"> <?php echo e($lead->mobile); ?></a>   <a href="https://wa.me/91<?php echo e($lead->mobile); ?>" target="_blank" aria-label="Whatsup"><i class="bi bi-whatsapp" style="color:#14D73F"></i><?php echo e($lead->mobile); ?></a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>       
    </div>
<script>
      function toggleDetails(element) {
            const detailsSection = element.previousElementSibling;
            detailsSection.classList.toggle('visible');
            element.textContent = detailsSection.classList.contains('visible') ? 'Hide details' : 'Show details';
        }

        function hideCard(element) {
            const card = element.closest('.enquiry-item');
            card.classList.add('hidden');
        }
</script>
    
   </main> 
     <?php $__env->stopSection(); ?>
 
<?php echo $__env->make('business.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/quickdials/public_html/resources/views/business/dashboard.blade.php ENDPATH**/ ?>