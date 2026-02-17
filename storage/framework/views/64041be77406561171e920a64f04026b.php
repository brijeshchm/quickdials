<?php echo View::make('admin/header'); ?>
        <div id="page-wrapper">
           <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2><a href="<?php echo e(url('developer/blog/blogdetails')); ?>">Blog Details</a></h2>
                     
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="d-flex flex-row-reverse">
                            <div class="page_action">
                                <button type="button" class="btn btn-primary" style="color:#fff;margin-top:20px"><a href="<?php echo e(url('developer/blog/addBlog')); ?>" style="color:#fff"> <i class="fa fa-plus" aria-hidden="true"></i> Add Blog</a></button>
                                 
                            
                            </div>
                            <div class="p-2 d-flex">
                                
                            </div>
                        </div>
                    </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">			
					<?php if(Session::has('alert-success')): ?>
						<div class="alert alert-success">
							<?php echo e(Session::get('alert-success')); ?>

						</div>
					<?php endif; ?>		
					<?php if(Session::has('success_msg')): ?>
						<div class="alert alert-success">
							<?php echo e(Session::get('success_msg')); ?>

						</div>
					<?php endif; ?>
					<?php if(Session::has('danger_msg')): ?>
						<div class="alert alert-danger">
							<?php echo e(Session::get('danger_msg')); ?>

						</div>
					<?php endif; ?>					
                   <style>
/* ==== Custom Panel Section Styling ==== */
.section-border {
    border: 2px solid #ddd;
    border-radius: 10px;
    padding: 25px;
    margin-bottom: 30px;
    background-color: #f9f9f9;
}

.section-border h4 {
    background-color: #007bff;
    color: #fff;
    padding: 10px 15px;
    margin: -25px -25px 20px -25px;
    border-radius: 10px 10px 0 0;
    font-size: 18px;
    font-weight: 600;
}

.section-border label {
    font-weight: 500;
}

.btn-primary {
    border-radius: 5px;
}
.panel-body{

padding:0px;
}
</style>

<div class="panel panel-default">
  

    <div class="panel-body">
         
        <div class="section-border">
            <h4>Blog Information</h4>
            <form class="form-horizontal" method="POST" onsubmit="return blogController.updateBlogMeta(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)">
                <?php echo e(csrf_field()); ?>


                <div class="form-group">
                    <label class="col-md-2 control-label">Name</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" value="<?php echo e(old('name',(isset($edit_data)) ? $edit_data->name:"")); ?>" placeholder="Enter "> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Title</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="title" value="<?php echo e(old('title',(isset($edit_data)) ? $edit_data->title:"")); ?>" placeholder="Enter Title">      
                                   </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Slug</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="slug" value="<?php echo e(old('slug', $edit_data->slug ?? '')); ?>" placeholder="Enter slug url"> 
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-2 control-label">Meta Title</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="meta_title" placeholder="Enter Meta Title"><?php echo e(old('meta_title', $edit_data->meta_title ?? '')); ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Meta Description</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="meta_description" placeholder="Enter Meta Description"><?php echo e(old('meta_description', $edit_data->meta_description ?? '')); ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label">Meta Keywords</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="meta_keywords" placeholder="Enter Meta Keywords" rows="5"><?php echo e(old('meta_keywords', $edit_data->meta_keywords ?? '')); ?></textarea>
                    </div>
                </div>
               
              
                <div class="form-group">
                    <label for="ratingValue" class="col-md-2 control-label">Rating Value</label>
                    <div class="col-md-8">
                    <select class="form-control" name="ratingvalue">
                    <option value="">Select Rating Value</option>
                    <?php 
                    $rating = array(1,2,3,3.5,4,4.5,4.75,5);
                    foreach($rating as $key=>$value){	
                    ?>
                    <option value="<?php echo $value; ?>" <?php if("$value"== old('ratingvalue')): ?>
                    selected="selected"	
                    <?php else: ?>
                    <?php echo e((isset($edit_data) && $edit_data->ratingvalue ==$value ) ? "selected":""); ?> <?php endif; ?>><?php echo $value; ?></option>
                    <?php } ?>
                    </select>
                            
                    </div>
                </div>

                <div class="form-group">
                    <label for="ratingcount" class="col-md-2 control-label">Rating Count</label>
                    <div class="col-md-8">								 
                        <input type="number" class="form-control" name="ratingcount" value="<?php echo e(old('ratingcount', $edit_data->ratingcount ?? '')); ?>">
                    </div>
                </div>
                <div class="form-group text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <input type="hidden" name="submit" value="Update">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn"></i> Update
                        </button>
                    </div>
                </div>
            </form>
        </div>

        
        <div class="section-border">
            <h4>About Description</h4>
            <form class="form-horizontal" method="POST" onsubmit="return blogController.updateAboutBlog(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)" >
                <?php echo e(csrf_field()); ?>


                <!-- <div class="form-group">
                    <label class="col-md-2 control-label">Heading</label>
                    <div class="col-md-8">
                        <input class="form-control" name="heading" value="<?php echo e($edit_data->heading); ?>" placeholder="Enter heading">
                    </div>
                </div> -->

                 <div class="form-group">
                    <label class="col-md-2 control-label">Description</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="description" placeholder="Enter description" rows="7"><?php echo e(old('description', $edit_data->description ?? '')); ?></textarea>
                    </div>
                </div>

                
                 <div class="form-group text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn"></i> Update Blog 
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="section-border">
            <h4>Page Content</h4>
            <form class="form-horizontal" method="POST" onsubmit="return blogController.updatePageContent(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)" >
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label class="col-md-2 control-label">Page Top Description (max 500 chars)</label>
                    <div class="col-md-10">
                        <textarea class="form-control" id="editor" name="top_content" rows="9" placeholder="Enter Page Top Description"><?php echo e(old('top_content', $edit_data->top_content ?? '')); ?></textarea>
                    </div>
                </div>
            <div class="form-group ">
                <label for="bottom_content" class="col-md-2 control-label">Page Bottom Description</label>
                <div class="col-md-10">
                <textarea class="form-control" id="editor" name="bottom_content" placeholder="Enter Page Bottom Description" rows="15"><?php echo e(old('bottom_content', $edit_data->bottom_content ?? '')); ?></textarea>
                </div>
            </div>	
            <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn"></i> Submit
            </button>
        </div>
            </form>
        </div>

  
        <div class="section-border">
            <h4>Blog Image</h4>
            <form class="form-horizontal" method="POST" onsubmit="return blogController.updateBlogImage(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>


                <div class="form-group">
                    <label class="col-md-2 control-label">Image(900*400)</label>
                    <div class="col-md-8">                    

                    <?php 
                        if(!empty($edit_data->image)){
                        $image = unserialize($edit_data->image);
                        $image = $image['large']['src'];
                        ?>
                        <?php if(isset($image)&&!empty($image)): ?>
                        <img loading="lazy" src="<?php echo e(url($image)); ?>" style="height:75px;width:75px;">
                        <a href="<?php echo e(url('developer/blog/del_icon/'.$edit_data->id)); ?>" title="remove"><i class="fa fa-times fa-fw" aria-hidden="true"></i></a>
                        <input type="hidden" class="" name="image" value="<?php echo e($edit_data->image); ?>" >
                        <?php endif; ?>
                        <?php  }else{ ?>
                            <input type="file" class="form-control" name="image"  accept=".jpg, .jpeg, .png, .webp">
                        <?php  } ?>
                        <?php if($errors->has('image')): ?>
                            <span class="error alert-danger">
                                <strong><?php echo e($errors->first('image')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
									<label for="image" class="col-md-2 control-label">Image banner(900*250)<span>*</span></label>
									<div class="col-md-7">
										
										<span class="blog-block">									 
										<?php 
										if(!empty($edit_data->image_banner)){
									 	$bimage = unserialize($edit_data->image_banner);
										$imagev = $bimage['large']['src'];
										?>
										<?php if(isset($imagev)&&!empty($imagev)): ?>
										<img loading="lazy" src="<?php echo e(url($imagev)); ?>" style="height:75px;width:75px;">
										<a href="<?php echo e(url('developer/blog/del_blog_banner/'.$edit_data->id)); ?>" title="remove"><i class="fa fa-times fa-fw" aria-hidden="true"></i></a>
										<input type="hidden" class="" name="image_banner" value="<?php echo e($edit_data->image_banner); ?>" >
										<?php endif; ?>
										<?php  }else{ ?>
										 <input type="file" class="form-control" name="image_banner"  accept=".jpg, .jpeg, .png, .webp">
 										<?php  } ?>
										<?php if($errors->has('image_banner')): ?>
											<span class="error alert-danger">
												<strong><?php echo e($errors->first('image_banner')); ?></strong>
											</span>
										<?php endif; ?>
										</span>
									</div>
								</div>
                 
 
                 <div class="form-group text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <button type="submit" name="submit" value="update_image" class="btn btn-primary">
                            <i class="fa fa-btn"></i> Update Image
                        </button>
                    </div>
                </div>
            </form>
        </div>


        
        <div class="section-border">
            <h4>FAQ Section</h4>
            <form class="form-horizontal" method="POST" onsubmit="return blogController.updateFaqBlog(this,<?php echo (isset($edit_data->id)? $edit_data->id:""); ?>)">
                <?php echo e(csrf_field()); ?>


        <div class="form-group">
                <label for="top_description" class="col-md-2 control-label">FAQ Question 1</label>
                <div class="col-md-8">
                    <input class="form-control" name="faqq1" placeholder="Enter FAQ Question 1" value="<?php echo e($edit_data->faqq1); ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="top_description" class="col-md-2 control-label">FAQ Answer 1</label>
                <div class="col-md-8">
                    <textarea class="form-control" name="faqa1" placeholder="Enter FAQ Answer 1"><?php echo e($edit_data->faqa1); ?></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <label for="top_description" class="col-md-2 control-label">FAQ Question 2</label>
                <div class="col-md-8">
                    <input class="form-control" name="faqq2" placeholder="Enter FAQ Question 2" value="<?php echo e($edit_data->faqq2); ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="top_description" class="col-md-2 control-label">FAQ Answer 2</label>
                <div class="col-md-8">
                    <textarea class="form-control" name="faqa2" placeholder="Enter FAQ Answer 2"><?php echo e($edit_data->faqa2); ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="top_description" class="col-md-2 control-label">FAQ Question 3</label>
                <div class="col-md-8">
                    <input class="form-control" name="faqq3" placeholder="Enter FAQ Question 3" value="<?php echo e($edit_data->faqq3); ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="top_description" class="col-md-2 control-label">FAQ Answer 3</label>
                <div class="col-md-8">
                    <textarea class="form-control" name="faqa3" placeholder="Enter FAQ Answer 3"><?php echo e($edit_data->faqa3); ?></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <label for="top_description" class="col-md-2 control-label">FAQ Question 4</label>
                <div class="col-md-8">
                    <input class="form-control" name="faqq4" placeholder="Enter FAQ Question 4" value="<?php echo e($edit_data->faqq4); ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="top_description" class="col-md-2 control-label">FAQ Answer 4</label>
                <div class="col-md-8">
                    <textarea class="form-control" name="faqa4" placeholder="Enter FAQ Answer 4"><?php echo e($edit_data->faqa4); ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="top_description" class="col-md-2 control-label">FAQ Question 5</label>
                <div class="col-md-8">
                    <input class="form-control" name="faqq5" placeholder="Enter FAQ Question 5" value="<?php echo e($edit_data->faqq5); ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="top_description" class="col-md-2 control-label">FAQ Answer 5</label>
                <div class="col-md-8">
                    <textarea class="form-control" name="faqa5" placeholder="Enter FAQ Answer 5"><?php echo e($edit_data->faqa5); ?></textarea>
                </div>
            </div>
             <div class="form-group text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn"></i> Submit
                        </button>
                    </div>
                </div>	
            </form>
        </div>
       
    </div>
</div>

                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
 
<script src="https://cdn.tiny.cloud/1/cue4xs3ng16ijvqslyevyjgdvxbztv2ggd37ion2jf716pv7/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: '#editor',
    height: 300,
    menubar: false,
    plugins: 'lists link image code',
    toolbar: 'bold italic | bullist numlist | link image | code',
    branding: false
});

 
</script>

<?php echo View::make('admin/footer'); ?><?php /**PATH /home/quickdials/public_html/resources/views/admin/blog/blog_update.blade.php ENDPATH**/ ?>