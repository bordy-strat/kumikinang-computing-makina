<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
<div class="w-section article-sec">
	<div class="w-container">
		<div class="w-clearfix news-link-block">
			<div>
				<div class="w-clearfix date-block">
					<div class="month"><?php echo date("M",strtotime(get_post_meta(get_the_ID(),"Event Date",true)));?></div>
					<h1 class="date"><?php echo date("d",strtotime(get_post_meta(get_the_ID(),"Event Date",true)));?></h1>
				</div>
				<?php if(has_post_thumbnail()):?>
					<?php the_post_thumbnail("full",array('class'=>'float-left'));?>
				<?php else:?>
					<img src="<?php echo get_template_directory_uri();?>/images/PiliPinas-Placeholder.jpg" class="float-left"/>
				<?php endif;?>
				<h3><?php echo the_title();?></h3>
				<h4>Event Description</h4>
				<h4>Time: <?php echo get_post_meta(get_the_ID(),"Event Start Time",true).' to '.get_post_meta(get_the_ID(),"Event End Time",true);?></h4>
				<p><?php echo the_content();?></p>
				<div class="w-clearfix"></div>
			</div>
			<iframe
				class="w-widget w-widget-map"
				frameborder="0" style="border:0"
				src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCrlbnq7dIJ4z2ufgcJ_bkmnxDR9hhuAyo
				&q=<?php echo urlencode(get_post_meta(get_the_ID(),"Event Location",true));?>" allowfullscreen>
			</iframe>
		</div>
	</div>
</div>
<?php endwhile; endif;?>
<?php get_footer(); ?>
