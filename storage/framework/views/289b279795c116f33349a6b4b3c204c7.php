<?php echo View::make('admin/header'); ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!--<div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo e($totalClientsCount or ""); ?></div>
                                    <div>Total Clients</div>
						
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0);">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
						
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo e($totalPaidClientsCount or ""); ?></div>
                                    <div>Total Paid Clients</div>
									
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0);">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo e($totalRegClientsThisMonth or ""); ?></div>
                                    <div>Client Reg. This Month</div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0);">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo e($totalPendingRenewals or ""); ?></div>
                                    <div>Pending Renewals</div>
                                </div>
                            </div>
                        </div>
                        <a href="javascript:void(0);">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>-->
            <!-- /.Client dashboard -->
			<div class="row">
				<div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-body">
							<div class="nc-form row form-group">
							
								<form method="GET" action="/developer/dashboard" autocomplete="off">
									<?php echo e(csrf_field()); ?>

									<div class="form-group">
										<div class="col-md-3">
											<label>Client Package Name</label>
											<select class="form-control" name="search[client_type]"> 			 
											<?php
										$clientsType = getClientsType();
										foreach($clientsType as $key=>$value){
											$selected = '';
											if(isset($search['client_type']) && $search['client_type']==$key)
												$selected = 'selected';
											echo "<option value='$key' $selected>$value</option>";
										}
										?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-3">
											<label>City</label>
											<select class="form-control select2-single-city" name="search[city][]" multiple>
												<option value="">-- SELECT CITY --</option>
												<?php if(count($citieslists)>0): ?>
												<?php if(isset($search['city'])): ?>
													<?php $__currentLoopData = $search['city']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php endif; ?>
												<?php $__currentLoopData = $citieslists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php if(isset($citySelected) && in_array($city->city,$citySelected)): ?>
														<option value="<?php echo e($city->city); ?>" selected><?php echo e($city->city); ?></option>
													<?php else: ?>
														<option value="<?php echo e($city->city); ?>"><?php echo e($city->city); ?></option>
													<?php endif; ?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-3">
											<label>Date From</label>
											<input type="text" class="form-control datef" name="search[datef]" value="<?php echo e(old('search[datef]',(isset($search['datef'])) ? $search['datef']:"")); ?>" placeholder="Enter Date From" >
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-3">
											<label>Date To</label>
											<input type="text" class="form-control datet" name="search[datet]" value="<?php echo e(old('search[datet]',(isset($search['datet'])) ? $search['datet']:"")); ?>" placeholder="Enter Date To">
										</div>
									</div>
									 
									<div class="form-group">
										<div class="col-md-3">
											<label>Client Category</label>
											<select class="form-control" name="search[client_cat]">
												<option value="">-- CLIENT CATEGORY --</option>
												<?php if(count($clientCategories)>0): ?>
													<?php $__currentLoopData = $clientCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<?php if(isset($search['client_cat']) && $search['client_cat']==$city->id): ?>
															<option value="<?php echo e($city->id); ?>" selected><?php echo e($city->name); ?></option>
														<?php else: ?>
															<option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
														<?php endif; ?>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<?php endif; ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-3">
											<label>Paid/Unpaid</label>
											<select class="form-control" name="search[paid_status]">
												<option value="" <?php echo (isset($search['paid_status'])&&$search['paid_status']=='')?"selected":""; ?>>-- Paid/UnPaid Status--</option>
												<option value="1" <?php echo (isset($search['paid_status'])&&$search['paid_status']=='1')?"selected":""; ?>>Paid</option>
												<option value="0" <?php echo (isset($search['paid_status'])&&$search['paid_status']=='0')?"selected":""; ?>>Unpaid</option>
											</select>
										</div>
									</div>
										<div class="form-group">
										<div class="col-md-3">
										<label>Select User</label>
											<select class="form-control select2-single" name="search[user]">
											<option value="">Select User</option>
											<?php $getUserList = getUserList(); ?>
											<?php if(isset($getUserList)): ?>
											<?php $__currentLoopData = $getUserList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $counsellor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if(isset($search['user']) && $search['user']==$counsellor->id): ?>
											<option value="<?php echo e($counsellor->id); ?>" selected><?php echo e($counsellor->first_name); ?> <?php echo e($counsellor->last_name); ?></option>
											<?php else: ?>
											<option value="<?php echo e($counsellor->id); ?>"  ><?php echo e($counsellor->first_name); ?> <?php echo e($counsellor->last_name); ?></option>
											<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-3">
											<label style="visibility:hidden">Filter</label>
											<button type="submit" class="btn btn-block btn-info">Filter</button>
										</div>
									</div>
								</form>
							</div>
							<div class="table-responsive" style="overflow-x: hidden;">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="datatable-view-paid-clients">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Business Name</th>
                                        <!--<th>Owner</th>-->
                                        <th>Mobile</th>
                                        <th>Leads</th>
                                        <th>Leads Remaining</th>
                                        <th>City</th>
                                       <!-- <th>Date/Amount/Count</th>-->
                                        <th>Expired On</th>
                                        <th>Comment</th>
                                        <th>Created by</th>
                                    </tr>
                                </thead>
								<tfoot>
                                    <tr>
                                        <th>UID</th>
                                        <th>Business Name</th>
                                        <!--<th>Owner</th>-->
                                        <th>Mobile</th>
                                        <th>Email</th>
										<th>Leads</th>
                                        <th>City</th>
                                       <!-- <th>Date/Amount/Count</th>-->
										<th>Expired On</th>
                                        <th>Comment</th>
                                        <th>Created by</th>
                                    </tr>
                                </tfoot>
                            </table>
							</div>
                            <!-- /.table-responsive -->
							<form id="export-leads" method="POST" onsubmit="return exportClients()" action="<?php echo e(url('/developer/lead/getleadssexcel')); ?>">
								<?php echo e(csrf_field()); ?>

								<input type="hidden" name="search[city]" value="">
								<input type="hidden" name="search[course]" value="">
								<input type="hidden" name="search[datef]" value="">
								<input type="hidden" name="search[datet]" value="">
								<input type="hidden" name="search[user]" value="">
								<input type="hidden" name="search[value]" value="">
								<div class="form-group">
									<div class="col-md-3">
										<div class="row">
											<button type="submit" class="btn btn-success btn-block export-clients">Export</button>
										</div>
									</div>
								</div>
							</form>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
				</div>
			</div>
			
			 
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
<?php echo View::make('admin/footer'); ?>		<?php /**PATH /home/quickdials/public_html/resources/views/admin/index.blade.php ENDPATH**/ ?>