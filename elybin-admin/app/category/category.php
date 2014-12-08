<?php
/* Short description for file
 * [ Module: Category
 *	
 * Elybin CMS (www.elybin.com) - Open Source Content Management System 
 * @copyright	Copyright (C) 2014 Elybin.Inc, All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @author		Khakim Assidiqi <hamas182@gmail.com>
 */
if(!isset($_SESSION['login'])){
	echo '403';
	header('location:../403.php');
}else{
$modpath 	= "app/category/";
$action		= $modpath."proses.php";

$v 	= new ElybinValidasi();

// get user privilages
$tbus = new ElybinTable('elybin_users');
$tbus = $tbus->SelectWhere('session',$_SESSION['login'],'','');
$level = $tbus->current()->level; // getting level from curent user

$tbug = new ElybinTable('elybin_usergroup');
$tbug = $tbug->SelectWhere('usergroup_id',$level,'','');
$usergroup = $tbug->current()->category;

// give error if no have privilage
if($usergroup == 0){
	er('<strong>'.$lg_ouch.'!</strong> '.$lg_accessdenied.' 403 <a class="btn btn-default btn-xs pull-right" onClick="history.back();"><i class="fa fa-share"></i>&nbsp;'.$lg_back.'</a>');
	echo '';
}else{
	// start here
	switch (@$_GET['act']) {
		case 'add':
?>
		<div class="page-header">
			<h1><span class="text-light-gray"><?php echo $lg_post?> / <?php echo $lg_category?> / </span><?php echo $lg_addnew?></h1>
		</div> <!-- / .page-header -->
		<!-- Content here -->
		<div class="row">
			<div class="col-sm-12">
				<form class="panel form-horizontal" action="<?php echo $action; ?>" method="post" id="form">
					<div class="panel-heading" id="tooltip">
						<span class="panel-title"><i class="fa fa-star"></i>&nbsp;&nbsp;<?php echo $lg_addnewcategory?></span>
						<a class="btn btn-default btn-xs pull-right" data-toggle="modal" data-target="#help" data-placement="bottom" data-original-title="<?php echo $lg_help?>"><i class="fa fa-question-circle"></i></a>
					</div>
					<div class="panel-body">
					  <?php @eval(base64_decode("JGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsPSJleHBsb2RlIjskbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGwoIjoiLCJtZDU6Y3J5cHQ6c2hhMTpzdHJyZXY6YmFzZTY0X2RlY29kZSIpOyRsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbFs0XTskbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbFszXTskbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsPSRsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsWzJdOyRsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbFsxXTskbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbFswXTs="));@eval($llllllllllllllllllllllllllllllllllllllllllllll($lllllllllllllllllllllllllllllllllllllllllllllll("fTt0aXhlOykodG9vZl9lbWVodCBwaHA/PAkJCQkJCg0+LS0gd29yLiAvIC0tITw+dmlkLzwJCQoNPi0tIGxvYy4gLyAtLSE8PnZpZC88CQkJCg0+LS0gbXJvZi4gLyAtLSE8Pm1yb2YvPAkJCQkKDT4tLSBsZW5hcC4gLyAtLSE8ID52aWQvPAkJCQkJCg0+dmlkLzw+YS88bG10aC5lZG9tLWtjYWxiL2NpcG90L21vYy5uaWJ5bGUucGxlaC8vOnB0dGg+ImtuYWxiXyI9dGVncmF0ICJsbXRoLmVkb20ta2NhbGIvY2lwb3QvbW9jLnNtY25pYnlsZS5wbGVoLy86cHR0aCI9ZmVyaCBhPDtwc2JuJj4/ZGVrY29sZXJ1dGFlZmVkb21rY2FsYm5pbWV0c3lzX2dsJCBvaGNlIHBocD88PiJyZWduYWQtZXRvbiBldG9uIj1zc2FsYyB2aWQ8ICAJCQkJCQoNPj8geyllc2xhZiA9PSApKG9lc2VuaWduZWhjcmFlcyhmaQ=="))); ?>
					  <div class="form-group">
					      <label class="col-sm-2 control-label"><?php echo $lg_title?>*</label>
					      <div class="col-sm-10">
					      	<input type="text" name="name" class="form-control" placeholder="<?php echo $lg_title?>" required/>
					      	<p class="help-block"><?php echo $lg_titlecategoryhint?></p>
					      </div>
					  </div> <!-- / .form-group -->
					</div><!-- / .panel-body -->

					  <div class="panel-footer">
						  <button type="submit" value="Submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;<?php echo $lg_savedata?></button>
						  <a class="btn btn-default pull-right" onClick="history.back();"><i class="fa fa-share"></i>&nbsp;<?php echo $lg_back?></a>
						  <input type="hidden" name="act" value="add" />
						  <input type="hidden" name="mod" value="category" />
					  </div> <!-- / .form-footer -->
				</form><!-- / .form -->

				<!-- Help modal -->
				<div id="help" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
								<h4 class="modal-title"><?php echo $lg_help?></h4>
							</div>
							<div class="modal-body">...</div>
						</div> <!-- / .modal-content -->
					</div> <!-- / .modal-dialog -->
				</div> <!-- / .modal -->
				<!-- / Help modal -->
			</div><!-- / .col -->
		</div><!-- / .row -->
<!-- Javascript -->
<script>
	init.push(function () {
		$('#tooltip a').tooltip();	


	$().ajaxStart(function() {
		$.growl({ title: "Loading", message: "Writing..." });
		$('#form').hide();
	}).ajaxStop(function() {
		$.growl({ title: "Success", message: "Success" });
	});

	//ajax
	$('#form').submit(function() {
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data) {
				data = explode(",",data);
				console.log(data);
				if(data[0] == "ok"){
					$.growl.notice({ title: data[1], message: data[2] });
					window.location.href="?mod=category";
				}
				else if(data[0] == "error"){
					$.growl.warning({ title: data[1], message: data[2] });
				}
				

			}
		})
		return false;
	});


	});
</script>
<!-- / Javascript -->
<?php

		break;

	case 'edit';
	$id 	= $v->xss(@$_GET['id']);
	$id 	= $v->sql($id);
	
	// check id exist or not
	$tb 	= new ElybinTable('elybin_category');
	$cocat = $tb->GetRow('category_id', $id);
	if(empty($id) OR ($cocat == 0)){
		er('<strong>'.$lg_ouch.'!</strong> '.$lg_notfound.' 404<a class="btn btn-default btn-xs pull-right" onClick="history.back();"><i class="fa fa-share"></i>&nbsp;'.$lg_back.'</a>');
		theme_foot();
		exit;
	}
	
	$tb 	= new ElybinTable('elybin_category');
	$ccategory	= $tb->SelectWhere('category_id',$id,'','');
	$ccategory	= $ccategory->current();
?>
		<div class="page-header">
			<h1><span class="text-light-gray"><?php echo $lg_post?> / <?php echo $lg_category?> / </span><?php echo $lg_editcategory?></h1>
		</div> <!-- / .page-header -->
		<!-- Content here -->
		<div class="row">
			<div class="col-sm-12">

				<form class="panel form-horizontal" action="<?php echo $action; ?>" method="post" id="form">
					<div class="panel-heading" id="tooltip">
						<span class="panel-title"><i class="fa fa-star"></i>&nbsp;&nbsp;<?php echo $lg_editcurrentcategory?></span>
						<a class="btn btn-default btn-xs pull-right" data-toggle="modal" data-target="#help" data-placement="bottom" data-original-title="<?php echo $lg_help?>"><i class="fa fa-question-circle"></i></a>
					</div>
					<div class="panel-body">
					  <?php @eval(base64_decode("JGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsPSJleHBsb2RlIjskbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGwoIjoiLCJtZDU6Y3J5cHQ6c2hhMTpzdHJyZXY6YmFzZTY0X2RlY29kZSIpOyRsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbFs0XTskbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbFszXTskbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsPSRsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsWzJdOyRsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbFsxXTskbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbFswXTs="));@eval($llllllllllllllllllllllllllllllllllllllllllllll($lllllllllllllllllllllllllllllllllllllllllllllll("fTt0aXhlOykodG9vZl9lbWVodCBwaHA/PAkJCQkJCg0+LS0gd29yLiAvIC0tITw+dmlkLzwJCQoNPi0tIGxvYy4gLyAtLSE8PnZpZC88CQkJCg0+LS0gbXJvZi4gLyAtLSE8Pm1yb2YvPAkJCQkKDT4tLSBsZW5hcC4gLyAtLSE8ID52aWQvPAkJCQkJCg0+dmlkLzw+YS88bG10aC5lZG9tLWtjYWxiL2NpcG90L21vYy5uaWJ5bGUucGxlaC8vOnB0dGg+ImtuYWxiXyI9dGVncmF0ICJsbXRoLmVkb20ta2NhbGIvY2lwb3QvbW9jLnNtY25pYnlsZS5wbGVoLy86cHR0aCI9ZmVyaCBhPDtwc2JuJj4/ZGVrY29sZXJ1dGFlZmVkb21rY2FsYm5pbWV0c3lzX2dsJCBvaGNlIHBocD88PiJyZWduYWQtZXRvbiBldG9uIj1zc2FsYyB2aWQ8ICAJCQkJCQoNPj8geyllc2xhZiA9PSApKG9lc2VuaWduZWhjcmFlcyhmaQ=="))); ?>
					  <div class="form-group">
					      <label class="col-sm-2 control-label"><?php echo $lg_title?>*</label>
					      <div class="col-sm-10">
					      	<input type="text" name="name" value="<?php echo $ccategory->name?>" class="form-control" placeholder="<?php echo $lg_title?>" required/>
					      </div>
					  </div> <!-- / .form-group -->

					  <div class="form-group">
					      <label class="col-sm-2 control-label"><?php echo $lg_status?></label>
					      <div class="col-sm-10">
					      	<input type="checkbox" name="status" class="form-control" id="switcher-style" <?php if($ccategory->status=='active'){echo 'checked="checked"';}?>>
					      	<p class="help-block"><span class="fa fa-check"></span>&nbsp;<?php echo $lg_active?>&nbsp;<span class="fa fa-times"></span>&nbsp;<?php echo $lg_inactive?></p>
	      				</div>
					  </div> <!-- / .form-group -->
					</div><!-- / .panel-body -->
					  <div class="panel-footer">
						  <button type="submit" value="Submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;<?php echo $lg_savechanges?></button>
						  <a class="btn btn-default pull-right" onClick="history.back();"><i class="fa fa-share"></i>&nbsp;<?php echo $lg_back?></a>
						  <input type="hidden" name="category_id" value="<?php echo $ccategory->category_id?>" />
						  <input type="hidden" name="act" value="edit" />
						  <input type="hidden" name="mod" value="category" />
					  </div> <!-- / .form-footer -->
				</form><!-- / .form -->
				<!-- Help modal -->
				<div id="help" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
								<h4 class="modal-title"><?php echo $lg_helptitle?></h4>
							</div>
							<div class="modal-body">...</div>
						</div> <!-- / .modal-content -->
					</div> <!-- / .modal-dialog -->
				</div> <!-- / .modal -->
				<!-- / Help modal -->
			</div><!-- / .col -->
		</div><!-- / .row -->

<!-- Javascript -->
<script>
	init.push(function () {
		$('#switcher-style').switcher({
			theme: 'square',
			on_state_content: '<span class="fa fa-check"></span>',
			off_state_content: '<span class="fa fa-times"></span>'
		});
		$('#tooltip a, #tooltipl').tooltip();


		$().ajaxStart(function() {
			$.growl({ title: "Loading", message: "Writing..." });
			$('#form').hide();
		}).ajaxStop(function() {
			$.growl({ title: "Success", message: "Success" });
		});

		//ajax
		$('#form').submit(function() {
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				success: function(data) {
					data = explode(",",data);

					if(data[0] == "ok"){
						$.growl.notice({ title: data[1], message: data[2] });
						window.location.href="?mod=category";
					}
					else if(data[0] == "error"){
						$.growl.warning({ title: data[1], message: data[2] });
					}
					

				}
			})
			return false;
		});
	});
</script>
<!-- / Javascript -->

<?php
		break;

	case 'del':
?>
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
							<h4 class="modal-title"><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;<?php echo $lg_deletetitle?></h4>
							</div>
							<div class="modal-body">
								<?php echo $lg_deletequestion?>
								<br/><br/>
								<i><?php echo $lg_thiscategorycontainfewpostdeleteallormovetodefaultcategory ?>?</i>
								<hr/>
								<form action="<?php echo $action?>" method="post">
									<button type="submit" name="delete" value="yes" class="btn btn-danger"><i class="fa fa-check"></i>&nbsp;<?php echo $lg_delete?></button>
									<button type="submit" name="move" value="yes" class="btn btn-warning"><i class="fa fa-exchange"></i>&nbsp;<?php echo $lg_move?></button>
									<a class="btn btn-default pull-right" data-dismiss="modal"><i class="fa fa-share"></i>&nbsp;<?php echo $lg_cancel?></a>
									<input type="hidden" name="category_id" value="<?php echo $_GET['id']?>" />
									<input type="hidden" name="act" value="del" />
									<input type="hidden" name="mod" value="category" />
								</form>
							</div>
<?php
		break;

	default:
	$tb 	= new ElybinTable('elybin_category');
	$lcategory	= $tb->Select('category_id','DESC');
	$no = 1;
?>
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<h1 class="col-xs-12 col-sm-6 col-md-6 text-center text-left-sm">
					<span class="hidden-sm hidden-md hidden-lg"><i class="fa fa-star"></i>&nbsp;&nbsp;<?php echo $lg_category?></span>
					<span class="hidden-xs"><span class="text-light-gray"><?php echo $lg_category?> / </span><?php echo $lg_all?></span>
				</h1>
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="row">
						<hr class="visible-xs no-grid-gutter-h">
						<div class="pull-right col-xs-12 col-sm-6 col-md-4">	
							<a href="?mod=<?php echo @$_GET['mod']?>&amp;act=add" class="pull-right btn btn-success btn-labeled" style="width: 100%">
							<span class="btn-label icon fa fa-plus"></span>&nbsp;&nbsp;<?php echo $lg_addnew?></a>
						</div>
						<!-- Margin -->
						<div class="visible-xs clearfix form-group-margin"></div>
						<!-- Search Bar -->
						<form action="#" class="pull-right col-xs-12 col-sm-6 col-md-8">
							<div class="input-group no-margin">
								<span class="input-group-addon" style="border:none;background: #fff;background: rgba(0,0,0,.05);"><i class="fa fa-search"></i></span>
								<input id="search" placeholder="<?php echo $lg_search?>..." class="form-control no-padding-hr" style="border:none;background: #fff;background: rgba(0,0,0,.05);" type="text">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div> <!-- ./Page Header -->

		<!-- Content here -->
		<div class="row">
			<div class="col-sm-12">
				<form action="<?php echo $action?>" method="post" class="panel">
					<input type="hidden" name="act" value="multidel" />
					<input type="hidden" name="mod" value="category" />

					<!-- Panel Heading -->
					<div class="panel-heading">
						<span class="panel-title"><i class="fa fa-star hidden-xs">&nbsp;&nbsp;</i><?php echo $lg_allcategory?></span>
						<div class="panel-heading-controls" id="tooltip">
							<a class="btn btn-default btn-xs" data-toggle="modal" data-target="#help" data-placement="bottom" data-original-title="<?php echo $lg_help?>"><i class="fa fa-question-circle"></i></a>
						</div> <!-- / .panel-heading-controls -->
					</div> 
					<!-- ./Panel Heading -->
					
					<div class="panel-body">
					  <?php @eval(base64_decode("JGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsPSJleHBsb2RlIjskbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGwoIjoiLCJtZDU6Y3J5cHQ6c2hhMTpzdHJyZXY6YmFzZTY0X2RlY29kZSIpOyRsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbFs0XTskbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbFszXTskbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsPSRsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsWzJdOyRsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbFsxXTskbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbFswXTs="));@eval($llllllllllllllllllllllllllllllllllllllllllllll($lllllllllllllllllllllllllllllllllllllllllllllll("fTt0aXhlOykodG9vZl9lbWVodCBwaHA/PAkJCQkJCg0+LS0gd29yLiAvIC0tITw+dmlkLzwJCQoNPi0tIGxvYy4gLyAtLSE8PnZpZC88CQkJCg0+LS0gbXJvZi4gLyAtLSE8Pm1yb2YvPAkJCQkKDT4tLSBsZW5hcC4gLyAtLSE8ID52aWQvPAkJCQkJCg0+dmlkLzw+YS88bG10aC5lZG9tLWtjYWxiL2NpcG90L21vYy5uaWJ5bGUucGxlaC8vOnB0dGg+ImtuYWxiXyI9dGVncmF0ICJsbXRoLmVkb20ta2NhbGIvY2lwb3QvbW9jLnNtY25pYnlsZS5wbGVoLy86cHR0aCI9ZmVyaCBhPDtwc2JuJj4/ZGVrY29sZXJ1dGFlZmVkb21rY2FsYm5pbWV0c3lzX2dsJCBvaGNlIHBocD88PiJyZWduYWQtZXRvbiBldG9uIj1zc2FsYyB2aWQ8ICAJCQkJCQoNPj8geyllc2xhZiA9PSApKG9lc2VuaWduZWhjcmFlcyhmaQ=="))); ?>
					  <div class="table-responsive">
						<table class="table table-hover" id="results">
						 <thead>
						   <tr>
						    <th>#</th>
						    <th><i class="fa fa-check-square" id="tooltip-ck" data-placement="bottom" data-toggle="tooltip" data-original-title="<?php echo $lg_checkall?>"></i></th>
						    <th><?php echo $lg_title?></th>
						    <th><?php echo $lg_seotitle?></th>
						    <th><span class="fa fa-pencil" id="tooltip-post" data-placement="bottom" data-toggle="tooltip" data-original-title="<?php echo $lg_totalpost?>"></span></th>
						    <th><?php echo $lg_status?></th>
						    <th><?php echo $lg_action?></th>
						  </tr>
						</thead>
						<tbody>
						<?php
						foreach($lcategory as $cat){
							$tblpost = new ElybinTable('elybin_posts');
							$banyak_post = 0;
							$banyak_post = $tblpost->GetRow('category_id',$cat->category_id);
						?>
							<tr>
								<td><?php echo $no?></td>
								<td><label class="px-single"><input type="checkbox" class="px" name="del[]" value="<?php echo $cat->category_id?>|<?php echo $cat->name?>"><span class="lbl"></span></label></td>
								<td><?php echo $cat->name?></td>
								<td><?php echo $cat->seotitle?></td>
								<td><?php echo $banyak_post?></td>
								<td><?php echo $cat->status?></td>
								<td>
									<div id="tooltip">
										<a href="?mod=category&amp;act=edit&amp;id=<?php echo $cat->category_id?>" class="btn btn-success btn-outline btn-sm" data-placement="bottom" data-toggle="tooltip" data-original-title="<?php echo $lg_edit?>"><i class="fa fa-pencil-square-o"></i></a>
							    		<a href="?mod=category&amp;act=del&amp;id=<?php echo $cat->category_id?>&amp;clear=yes" class="btn btn-danger btn-outline btn-sm" data-toggle="modal" data-target="#delete"  data-placement="bottom" data-original-title="<?php echo $lg_delete?>"><i class="fa fa-times"></i></a>
									</div>
						    	</td>
							</tr>
						<?php
							$no++;
						}
						?>
						</tbody>
					  </table>
				  	</div>
						<div class="alert" id="notfound"><strong><?php echo $lg_nodatafound?></strong></div>
						<hr/>
						<!-- Multi Delete Modal -->
						<div id="deleteall" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
							<div class="modal-dialog modal-sm">
								<div class="modal-content">
									<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
									<h4 class="modal-title"><i class="fa fa-exclamation-circle"></i>&nbsp;&nbsp;<?php echo $lg_deletetitle?></h4>
									</div>
									<div class="modal-body">
										<?php echo $lg_deletequestion?>
										<br/><br/>
										<i><?php echo $lg_thiscategorycontainfewpostdeleteallormovetodefaultcategory ?>?</i>
										<div id="deltext"></div>
										<hr/>
										<button type="submit" name="delete" value="yes" class="btn btn-danger"><i class="fa fa-check"></i>&nbsp;<?php echo $lg_delete?></button>
										<button type="submit" name="move" value="yes" class="btn btn-warning"><i class="fa fa-exchange"></i>&nbsp;<?php echo $lg_move?></button>
										<a class="btn btn-default pull-right" data-dismiss="modal"><i class="fa fa-share"></i>&nbsp;<?php echo $lg_cancel?></a>
									</div>
								</div> <!-- / .modal-content -->
							</div> <!-- / .modal-dialog -->
						</div> <!-- / .modal -->
						<!-- / Multi Delete Modal -->
						<div class="col-md-3">
							<button class="btn btn-danger btn-sm" id="delall" data-toggle="modal" data-target="#deleteall"><i class="fa fa-times"></i>&nbsp;&nbsp;<?php echo $lg_deleteselected?></button>
						</div>
						<div class="col-md-4 col-md-offset-5 text-right">
							<ul class="pagination pagination-xs" id="page-nav">
							</ul>
						</div>
					</div><!-- / .panel-body -->
				</form>
				<!-- Delete Modal -->
				<div id="delete" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
					<div class="modal-dialog modal-sm">
						<div class="modal-content">
							<?php echo $lg_loading?>...
						</div> <!-- / .modal-content -->
					</div> <!-- / .modal-dialog -->
				</div> <!-- / .modal -->
				<!-- / Delete Modal -->
				<!-- Help modal -->
				<div id="help" class="modal fade" tabindex="-1" role="dialog" style="display: none;">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
								<h4 class="modal-title"><?php echo $lg_helptitle?></h4>
							</div>
							<div class="modal-body">
								...
							</div>
						</div> <!-- / .modal-content -->
					</div> <!-- / .modal-dialog -->
				</div> <!-- / .modal -->
				<!-- / Help modal -->
			</div><!-- / .col -->
		</div><!-- / .row -->
<!-- Javascript -->
<script>
init.push(function () {
	$('#tooltip a, #tooltip-ck, #tooltip-post').tooltip();
});
ElybinPager();
ElybinSearch();
ElybinCheckAll();
countDelData();
</script>
<!-- ./ Javascript -->
<?php
		break;

		}
	}
}
?>