<?php /* Template Name: Request Page Template */ get_header(); ?>
<?php $pageID = get_the_ID();?>
	<div data-ix="dissolve" class="w-section single-header">
		<div class="single-article-header">
			<div class="overlay-text">
				<div class="w-container">
					<h1>Request for VCM Demo</h1>
					<p class="header-p">
				</div>
			</div>
			<?php if(has_post_thumbnail( $pageID )):?>
			<?php print_r(get_the_post_thumbnail($pageID, null, array('class'=>'singleheader-img')));?>
			<?php else:?>
			<img src="<?php echo get_template_directory_uri();?>/images/PiliPinas-Placeholder.jpg" class="singleheader-img"/>
			<?php endif;?>
		</div>
	</div>
	<div class="w-section article-sec">
		<div class="w-container article-container">
			<p>Still think the VCM is an unapproachable piece of gadgetry? Want to familiarize yourself with Smartmatic’s new-and-improved vote-tallying apparatus? Fill out the form below to request for a demonstration. Thanks!</p>
			<br/>
			<?php echo do_shortcode('[contact-form-7 id="447" title="Contact form 1"]');?>
		</div>
	</div>
<?php get_footer(); ?>
