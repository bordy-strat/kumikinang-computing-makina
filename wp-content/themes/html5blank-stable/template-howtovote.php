<?php /* Template Name: HowToVote Page Template */ get_header(); ?>
	<div data-ix="dissolve" class="w-section single-header">
		<div class="single-article-header">
			<div class="overlay-text">
				<div class="w-container">
					<h1>How To Vote</h1>
					<p class="header-p">Tutorials on voting.</p>
				</div>
			</div>
			<?php print_r(get_the_post_thumbnail(get_the_ID(), null, array('class'=>'singleheader-img')));?>
		</div>
	</div>
	<div class="w-section article-sec">
	    <div class="w-container">
	      <h1>How to Vote</h1>
	      <p>The 2016 national elections will be the third time automated voting will be enforced in the country. If you still have not gotten the hang of it, it is not too late to learn. We have prepared a few visual guides for you.</p>
	      <div data-ix="scroll-up" class="content-link-block">
	        <div data-duration-in="300" data-duration-out="100" class="w-tabs">
	          <div class="w-tab-menu">
	            <a data-w-tab="Tab 2" class="w-tab-link w--current w-inline-block tab-link">
	              <div>Infographics</div>
	            </a>
	            <a data-w-tab="Tab 1" class="w-tab-link w-inline-block tab-link">
	              <div>Videos</div>
	            </a>
	          </div>
	          <div class="w-tab-content how-to-vote-content">
	            <div data-w-tab="Tab 2" class="w-tab-pane w--tab-active">
	                <?php $items = getPostsByCategory("HowToVoteInfographics","publish");?>
					<?php $f = 0; foreach($items as $key=>$item):?>
						<?php if(($key%3) == 0):?>
							<?php $f = $key;?>
							<div class="w-row">
						<?php endif;?>
								<div class="w-col w-col-4">
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
						<?php if(((($key+1)%3 == 0) && ($key > $f)) || (($key+1) == sizeof($items))):?>
							</div>
						<?php endif;?>
					<?php endforeach;?>
	            </div>
	            <div data-w-tab="Tab 1" class="w-tab-pane">
	            	<?php $items = getPostsByCategory("HowToVoteVideos","publish");?>
					<?php $f = 0; foreach($items as $key=>$item):?>
						<?php if(($key%3) == 0):?>
							<?php $f = $key;?>
							<div class="w-row">
						<?php endif;?>
								<div class="w-col w-col-4">
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
						<?php if(((($key+1)%3 == 0) && ($key > $f)) || (($key+1) == sizeof($items))):?>
							</div>
						<?php endif;?>
					<?php endforeach;?>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
<?php get_footer(); ?>
