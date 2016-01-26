<?php get_header(); $post = get_post(get_the_ID());?>
	<div data-ix="dissolve" class="w-section single-header">
		<div class="single-article-header">
			<div class="overlay-text">
				<div class="w-container">
					<h1>Page under construction.</h1>
				</div>
			</div>
			<img src="<?php echo get_template_directory_uri();?>/images/PiliPinas-Placeholder.jpg" class="singleheader-img"/>
		</div>
	</div>
	<div class="w-section article-sec">
		<div class="w-container article-container">
			<?php $vcmnews = current(getPostsByCategory("VCMNews","publish",1,0,'date','DESC'));?>
			<p>Oops! The page is still under development. In the meantime, take a look at the new Vote Counting Machine <a href="<?php echo $vcmnews->guid;?>/">here</a>.</p>
		</div>
	</div>
<?php get_footer(); ?>
