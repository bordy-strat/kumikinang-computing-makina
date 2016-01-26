<?php /* Template Name: About Page Template */ get_header(); ?>
<?php $pageID = get_the_ID();?>
<?php $post = current(getPostsByCategory("About","publish",1,0,'date','DESC'));?>
	<div data-ix="dissolve" class="w-section single-header">
		<div class="single-article-header">
			<div class="overlay-text">
				<div class="w-container">
					<h1><?php echo $post->post_title;?></h1>
					<p class="header-p">
					<?php if(get_post_custom_values('custom author', $post->ID)):?>
					<?php echo current(get_post_custom_values('custom author', $post->ID));?>
					<?php else:?>
					<?php echo get_the_author_meta("user_nicename",$post->post_author);?>
					<?php endif;?>
					 on <?php echo date('F j Y',strtotime($post->post_date));?></p>
				</div>
			</div>
			<?php print_r(get_the_post_thumbnail($pageID, null, array('class'=>'singleheader-img')));?>
		</div>
	</div>
	<div class="w-section article-sec">
		<div class="w-container article-container">
			<?php echo $post->post_content;?>
		</div>
	</div>
<?php get_footer(); ?>
