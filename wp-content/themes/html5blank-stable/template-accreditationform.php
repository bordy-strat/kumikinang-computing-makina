<?php /* Template Name: Accreditation FORM Page Template */ get_header(); ?>
	<div class="w-section single-header">
		<div class="single-article-header">
		<div class="overlay-text">
			<div class="w-container">
				<h1>Media Accreditation Application Form</h1>
			</div>
		</div>
			<?php the_post_thumbnail("full",array('class'=>'singleheader-img'));?>
		</div>
	</div>
	<div class="w-container">
		<?php if(isset($errors) && !empty($errors)):?>
			<ol>
			<?php foreach($errors as $error):?>
				<li><?php echo $error;?></li>
			<?php endforeach;?>
			</ol>
		<?php endif;?>
	</div>
	<div class="w-container">
		<?php echo do_shortcode('[userform]');?>
	</div>
<?php get_footer(); ?>
