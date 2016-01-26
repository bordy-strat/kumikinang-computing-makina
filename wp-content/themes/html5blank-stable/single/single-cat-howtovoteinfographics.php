<?php get_header(); $post = get_post(get_the_ID());?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<div data-ix="dissolve" class="w-section single-header">
		<div class="single-article-header">
			<div>
				<div class="w-container">
					<h1><?php echo the_title();?></h1>
					<p class="header-p">
						<?php if(get_post_custom_values('custom author', get_the_ID())):?>
						<?php echo current(get_post_custom_values('custom author', get_the_ID()));?>
						<?php else:?>
						<?php echo the_author_meta('user_nicename'); ?> 
						<?php endif;?>
						<?php the_date("M. j Y", "on ");?>
					</p>
				</div>
			</div>
			<?php if(has_post_thumbnail()):?>
				<?php the_post_thumbnail("full",array('class'=>'singleheader-img'));?>
			<?php else:?>
				<img src="<?php echo get_template_directory_uri();?>/images/PiliPinas-Placeholder.jpg" class="singleheader-img"/>
			<?php endif;?>
		</div>
	</div>
	<div class="w-section article-sec">
		<div class="w-container article-container">
			<?php echo the_content();?>
		</div>
	</div>
	<?php $items = getPostsByCategory("HowToVote","publish",-1,0,"date","DESC");?>
	<?php if(count($items) > 1):?>
	<div id="News-Sec" class="w-section news-sec">
		<h2>More Tutorials</h2>
		<div data-animation="slide" data-duration="500" data-infinite="1" data-delay="4000" data-autoplay="1" class="w-slider slider">
			<div class="w-slider-mask slider-mask">
				<?php foreach($items as $item):?>
				<?php if($item->ID != $post->ID):?>
				<div class="w-slide w-clearfix slide news-content">
					<div class="news-content">
						<a href="<?php echo $item->guid;?>" data-ix="scroll-up" class="w-inline-block content-link-block">
							<div class="img-mask">
								<?php if(get_the_post_thumbnail($item->ID, null, array('class'=>'thumb'))):?>
									<?php print_r(get_the_post_thumbnail($item->ID, null, array('class'=>'thumb')));?>
								<?php else:?>
									<img src="<?php echo get_template_directory_uri();?>/images/PiliPinas-Placeholder.jpg" class="thumb"/>
								<?php endif;?>
							</div>
							<div class="text-container">
								<h4 class="h4"><?php echo $item->post_title;?>&nbsp;</h4>
								<p><?php echo $item->post_excerpt;?></p>
							</div>
							<div class="w-clearfix by-line">
								<div class="author">
									<?php if(get_post_custom_values('custom author', $item->ID)):?>
									<?php echo current(get_post_custom_values('custom author', $item->ID));?>
									<?php else:?>
									<?php echo get_the_author_meta('user_nicename',$item->post_author); ?> 
									<?php endif;?>
								</div>
								<div class="date">
									<?php echo date('M j Y',strtotime($item->post_date));?>
								</div>
							</div>
						</a>
					</div>
				</div>
				<?php endif;?>
				<?php endforeach;?>
			</div>
			<div class="w-slider-arrow-left arrow">
				<div class="w-icon-slider-left"></div>
			</div>
			<div class="w-slider-arrow-right arrow">
				<div class="w-icon-slider-right"></div>
			</div>
			<div class="w-slider-nav w-round"></div>
		</div>
	</div>
	<?php endif;?>
<?php endwhile; endif;?>
<?php get_footer(); ?>
