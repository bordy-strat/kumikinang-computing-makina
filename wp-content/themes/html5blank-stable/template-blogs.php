<?php /* Template Name: Blogs Page Template */ get_header(); ?>
	<div data-ix="dissolve" class="w-section single-header">
		<div class="single-article-header">
			<div class="overlay-text">
				<div class="w-container">
					<h1>Blogs</h1>
					<p class="header-p">You got all the latest Blogs here</p>
				</div>
			</div>
			<?php print_r(get_the_post_thumbnail(get_the_ID(), null, array('class'=>'singleheader-img')));?>
		</div>
	</div>
	<div class="w-section article-sec all-news">
		<?php $items = getPostsByCategory('Blog post','publish',-1,0,'date','DESC');?>
		<?php $f = 0; foreach($items as $key=>$item):?>
			<?php if(($key%4) == 0):?>
				<?php $f = $key;?>
				<div class="w-row">
			<?php endif;?>
					<div class="w-col w-col-3">
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
								<h4><?php echo get_the_title($item->ID);?></h4>
								<p>
									<?php $e = $item->post_excerpt;?>
									<?php if(strlen($e) > 110):?>
										<?php echo substr($e, 0,107)."...";?>
									<?php else:?>
										<?php echo $e;?>
									<?php endif;?>
								</p>
							</div>
							<div class="w-clearfix by-line">
								<?php if(get_post_custom_values('custom author', $item->ID)):?>
								<div class="author">By <?php echo current(get_post_custom_values('custom author', $item->ID));?></div>
								<?php else:?>
								<div class="author">By <?php echo get_the_author_meta('user_nicename',$item->post_author);?></div>
								<?php endif;?>
								<div class="date"><?php echo date("M d Y",strtotime($item->post_date));?></div>
							</div>
						</a>
						</div>
					</div>
			<?php if(((($key+1)%4 == 0) && ($key > $f)) || (($key+1) == sizeof($items))):?>
				</div>
			<?php endif;?>
		<?php endforeach;?>
	</div>
<?php get_footer(); ?>