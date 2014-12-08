<?php
  include_once 'header.php';
  include_once 'menu.php';
  
  $v 	= new ElybinValidasi();
  $tbp = new ElybinTable('elybin_posts');
  
  $id = $v->sql($_GET['id']);

  $cpost = $tbp->GetRowAnd('category_id', $id, 'status', 'publish');
  if($cpost == 0 OR $id == ''){
	header('location: 404.html');
	exit;
  }else{
	// get category name
	$tbca = new ElybinTable('elybin_category');
	$category = $tbca->SelectWhere('category_id', $id,'','')->current();
  }
  
  // pager
  $muchpage = ceil($cpost/$op->posts_per_page);
  if(!empty($p)){
  	$page = $p;
  	$postposition = ($page-1)*$op->posts_per_page;
  	$post = $tbp->SelectCustom("SELECT * FROM", "WHERE `status` = 'publish' AND `category_id` = '$id' AND `category_id` <> '' ORDER BY `post_id` DESC LIMIT $postposition, $op->posts_per_page");
  }else{
  	$page = 1;
    $post = $tbp->SelectCustom("SELECT * FROM", "WHERE `status` = 'publish' AND `category_id` = '$id' AND `category_id` <> ''  ORDER BY `post_id` DESC LIMIT 0, $op->posts_per_page");
  }
?>

    <!-- Page Header -->
    <header class="intro-header intro-hide">
    </header>

    <!-- Main Content -->
    <div class="container">
		<?php 
		// show if search result no zero
		if($cpost == 0){
		?>
		<div class="clearfix form-group-margin margin-t"></div>
		<div class="row">
			<div class="col-md-9">
				<h4>No data found.</h4>
			</div>
			<?php include("sidebar.php"); ?>
		</div>
		<?php
		}else{
		?>
		<div class="clearfix form-group-margin margin-t"></div>
		<div class="row">
			<div class="col-md-9">
				<h4 class="pull-right"><?php echo $cpost; ?> post found for category <i class="text-dash"><?php echo $category->name; ?></i>.</h4>
			</div>
		</div>
        <div class="row">
			<div class="col-md-9">
				<?php
					foreach ($post as $p) {
						// user 
						$tbu = new ElybinTable('elybin_users');
						$user = $tbu->SelectWhere('user_id',$p->author,'','')->current()->fullname;
						$user_id = $tbu->SelectWhere('user_id',$p->author,'','')->current()->fullname;

						//comment
						$tbc = new ElybinTable('elybin_comments');
						$comment = $tbc->GetRow('post_id',$p->post_id,'','');

						// category 
						$tbca = new ElybinTable('elybin_category');
						$category = $tbca->SelectWhere('category_id',$p->category_id,'','')->current();
						
						// tag
						$tag = $p->tag;
						if($tag !== ''){
							$tag = explode(",", $tag);
							$ctag = count($tag);
							
							if($ctag >= 3) $tag = array_slice($tag, 0, 3);
						}else{
							$ctag = 0;
						}

						//content
						$content = substr(strip_tags(html_entity_decode($p->content)),0,500);
						
						// date 
						$date = explode("-", $p->date);
						$monthpfx = date("M", mktime(0,0,0,$date[1],1,2000));
						
				?>
				<!-- post -->
				<div class="col-md-2">
					<div class="circle-date">
					    <span class="day-prefix">Writed</span>
						<span class="day"><?php echo $date[2]?></span>
						<span class="slash"></span> 
						<span class="month"><?php echo $date[1]?></span>
						<span class="month-prefix"><?php echo $monthpfx?></span>
					</div>
				</div>
				<div class="col-md-10">
					<div class="post-preview">
						<a href="post-<?php echo $p->post_id?>-<?php echo $p->seotitle?>.html">
							<h2 class="post-title">
								<?php echo $p->title; ?>
							</h2>
						 </a>	
						<p class="post-meta">Posted by <em><?php echo $user?></em><?php if($comment>0){ ?> got <?php echo $comment?> comments<?php } ?><span class="pull-right hidden-xs"><?php echo time_elapsed_string($p->date.$p->time)?></span></p>
						<?php
							if($p->image !== ''){
						?>
						<img src="elybin-file/post/<?php echo $p->image?>" class="img-responsive img-rounded" alt="<?php echo $p->title?>">
						<?php } ?>
						<p class="post-subtitle">
							<?php echo $content; ?>
						</p>
						

						<p class="post-meta">
							<i class="fa fa-star"></i>&nbsp;&nbsp;<?php echo $lg_category?>: <span class="text-dash"><?php echo $category->name?></span><br/>
						</p>
						<div class="row">
							<div class="col-md-2 pull-right">
								<a href="post-<?php echo $p->post_id?>-<?php echo $p->seotitle?>.html" class="btn btn-default pull-right">More &rarr;</a>	
							</div>
							<div class="col-md-10">
								<hr>
							</div>
						</div>
					</div>
				</div>
				<!-- ./post -->
				<?php } ?>
			</div>
			<!-- .col-md-9 / ./post-container-->
			<?php
			if($cpost > 0){
			?>
			<div style="height: 90px;"></div>
			<?php } ?>
<?php
  include 'sidebar.php';
?>
        </div>
        <!-- .row -->
		<?php } ?>
    </div>

    <?php
		if($muchpage > 0){
	?>
    <hr>
	<!-- Pager -->
	<div class="pager">
		<h3><?php echo strtoupper($lg_page)?></h3>
		<ul>
			<?php
				if($page > 1){
			?>
			<li><a href="category-<?php echo $id ?>-<?php echo $page-1?>-<?php echo $category->seotitle ?>.html" alt="Next"><i class="fa fa-angle-left"></i></a></li>
			<?php } ?>
			<?php
				for($i=1; $i<=$muchpage; $i++){
					if($i == $page){
						$ds = ' class="disabled"';
					}else{
						$ds = '';
					}
			?>
			<li<?php echo $ds?>><a href="category-<?php echo $id ?>-<?php echo $i?>-<?php echo $category->seotitle ?>.html" alt="<?php echo $i?>"><?php echo $i?></a></li>
			<?php } ?>
			<?php
				if($page < $muchpage){
			?>
			<li><a href="category-<?php echo $id ?>-<?php echo $page+1?>-<?php echo $category->seotitle ?>.html" alt="Next"><i class="fa fa-angle-right"></i></a></li>
			<?php } ?>
		</ul>
	</div>
	<?php } ?>
<?php
  include "footer.php";
?>