<?php get_header(); ?>
<div class="w-section mobile-sec">
	<img src="<?php echo get_template_directory_uri();?>/images/Header_1.jpg">
 </div>
<div id="Homey" data-ix="dissolve" class="w-section head-sec">
	<div class="w-row row-photo">
		<?php $a = getPostsByCategory("header image","publish",-1,0,"title");?>
    <?php $random = array_rand($a,18); shuffle($random);?>
		<?php for($i = 0; $i < 6; $i++):?>
    <?php $item = $a[$random[$i]];?>
		<div class="w-col w-col-2 no-padding">
			<div data-ix="show-photo" class="photo-content">
				<?php echo $item->post_content;?>
			</div>
		</div>
		<?php endfor;?>
	</div>
	<div class="w-row row-photo">
		<?php $row1 = getPostsByCategory("header image","publish",6,6,"title");?>
		<?php for($i = 6; $i < 12; $i++):?>
    <?php $item = $a[$random[$i]];?>
		<div class="w-col w-col-2 no-padding">
			<div data-ix="show-photo" class="photo-content">
				<?php echo $item->post_content;?>
			</div>
		</div>
		<?php endfor;?>
	</div>
	<div class="w-row row-photo">
		<?php $row1 = getPostsByCategory("header image","publish",6,12,"title");?>
		<?php for($i = 12; $i < 18; $i++):?>
    <?php $item = $a[$random[$i]];?>
		<div class="w-col w-col-2 no-padding">
			<div data-ix="show-photo" class="photo-content">
				<?php echo $item->post_content;?>
			</div>
		</div>
		<?php endfor;?>
	</div>
	<div class="more-down">
		<div class="scroll-down-btn">
			<div data-ix="dissolve">Scroll down</div>
			<a href="#blog" data-ix="hover-down" class="w-inline-block link-down">
				<img src="<?php echo get_template_directory_uri();?>/images/double_down.png">
			</a>
		</div>
	</div>
</div>
<div id="blog" class="w-section news-sec background">
	<div class="w-container">
		<a href="#" data-ix="show-top" class="w-inline-block show-top">
			<img width="17" src="<?php echo get_template_directory_uri();?>/images/double_down.png" class="arrow-up">
			<div>show top</div>
		</a>
		<div class="intro-div">
			<?php
				$obj = getPostByTitle("Header text");
				echo $obj->post_content;
			?>
		</div>
	</div>
</div>
<div class="w-section sticky-posts-sec">
  <div class="w-row">
    <?php $externals = getPostsByCategory("HomeExternalLink","publish",6,0,"date","DESC");?>
    <div class="w-col w-col-4 links-column-1">
      <?php foreach($externals as $link):?>
      <?php if(has_post_thumbnail( $link->ID )):?>
      <div class="public-link-container" style="background-image: url('<?php echo current(wp_get_attachment_image_src( get_post_thumbnail_id($link->ID), full ));?>');">
      <?php else:?>
      <div class="public-link-container" style="background-image: url('<?php echo get_template_directory_uri();?>/images/PiliPinas-Placeholder.jpg');">
      <?php endif;?>
        <?php if(get_post_custom_values('External Link', $link->ID)):?>
        <a href="<?php echo current(get_post_custom_values('External Link', $link->ID));;?>" target="_blank" data-ix="show-text" class="w-inline-block public-link">
        <?php else:?>
        <a href="#" data-ix="show-text" class="w-inline-block public-link">
        <?php endif;?>
          <div data-ix="public-text-move" class="public-text">
            <h3><?php echo $link->post_title;?></h3>
            <p class="public-p"><?php echo $link->post_content;?></p>
          </div>
        </a>
      </div>
      <?php endforeach;?>
    </div>
    <div class="w-col w-col-4">
      <div class="w-clearfix news-col">
        <h3 class="news-heading">News</h3>
        <a href="<?php echo getPageUrl("News");?>" class="more-news">More News</a>
        <?php $vcmnews = current(getPostsByCategory("VCMNews","publish",1,0,'date','DESC'));?>
        <?php $news = getPostsByCategory("News","publish",2,0,'date','DESC');?>
        <a href="<?php echo $vcmnews->guid;?>" class="w-inline-block content-link-block">
          <div class="img-mask">
            <?php if(has_post_thumbnail( $vcmnews->ID )):?>
            <?php print_r(get_the_post_thumbnail($vcmnews->ID, null, array('class'=>'thumb')));?>
            <?php else:?>
            <img src="<?php echo get_template_directory_uri();?>/images/PiliPinas-Placeholder.jpg" class="thumb" />
            <?php endif;?>
          </div>
          <div class="text-container">
            <h4><?php echo get_the_title($vcmnews->ID);?></h4>
            <p><?php echo $vcmnews->post_excerpt;?></p>
          </div>
          <div class="w-clearfix by-line">
            <?php if(get_post_custom_values('custom author', $vcmnews->ID)):?>
            <div class="author">By <?php echo current(get_post_custom_values('custom author', $vcmnews->ID));?></div>
            <?php else:?>
            <div class="author">By <?php echo get_the_author_meta('user_nicename',$vcmnews->post_author);?></div>
            <?php endif;?>
            <div class="date"><?php echo date("M d Y",strtotime($vcmnews->post_date));?></div>
          </div>
        </a>
        <?php foreach($news as $item):?>
        <div class="w-clearfix news-link-block">
          <div class="photo-thumb-mask">
            <?php if(has_post_thumbnail( $item->ID )):?>
            <?php print_r(get_the_post_thumbnail($item->ID, null, array('class'=>'thumb')));?>
            <?php else:?>
            <img src="<?php echo get_template_directory_uri();?>/images/PiliPinas-Placeholder.jpg" class="thumb-img-news" />
            <?php endif;?>
          </div>
          <div class="news-text">
          	<h4><?php echo get_the_title($item->ID);?></h4>
            <p>
            	<?php echo $item->post_excerpt;?>
            	<a href="<?php echo $item->guid;?>" class="read-more">Read more</a>
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
        </div>
    	<?php endforeach;?>
        <a href="<?php echo getPageUrl("News");?>" class="more-news">More News</a>
      </div>
    </div>
    <div class="w-col w-col-4">
      <div class="news-col">
        <h3 class="news-heading">U<rteselectionmarker></rteselectionmarker>pcom<rteselectionmarker></rteselectionmarker>ing Events</h3>
        <?php $events = getEventsPosts(0,4);?>
        <?php foreach($events as $key => $event):?>
        <div class="news-link-block">
          <div class="w-clearfix date-block">
            <div class="month"><?php echo date("M",strtotime($event->EventDate));?></div>
            <h1 class="date"><?php echo date("d",strtotime($event->EventDate));?></h1>
          </div>
          <a href="<?php echo $event->guid;?>" class="w-inline-block event-photo-thumb <?php echo ($key>0)?'smaller-thumb':'';?>">
            <?php if(has_post_thumbnail($event->ID)):?>
            <?php print_r(get_the_post_thumbnail($event->ID,null,array('class'=>'thumb-img-news')));?>
            <?php else:?>
            <img src="<?php echo get_template_directory_uri();?>/images/PiliPinas-Placeholder.jpg" class="thumb-img-news">
            <?php endif;?>
          </a>
          <div class="w-richtext rich-text">
            <h4><?php echo $event->post_title;?></h4>
            <p><?php echo $event->post_excerpt;?></p>
          </div>
          <div class="w-clearfix by-line">
            <?php if(get_post_custom_values('custom author', $event->ID)):?>
            <div class="author">By <?php echo current(get_post_custom_values('custom author', $event->ID));?></div>
            <?php else:?>
            <div class="author">By <?php echo get_the_author_meta('user_nicename',$event->post_author);?></div>
            <?php endif;?>
            <div class="date"><?php echo date("M d Y",strtotime($event->post_date));?></div>
          </div>
        </div>
        <?php endforeach;?>
      </div>
      <a href="<?php echo getPageUrl("Upcoming events");?>" class="more-news">More Events</a>
    </div>
  </div>
</div>
<div id="VCM" class="w-section sec-2">
	<div class="w-container">
		<div class="news-container">
			<?php $obj = getPostByTitle('Video Home Text'); echo $obj->post_content;?>
      <?php $video = current(getPostsByCategory("HomeVCMVideo","publish",1,0,"date","DESC"));?>
			<div data-ix="scroll-up-3" class="w-embed embed-video-vcm-1">
				<?php echo html_entity_decode(do_shortcode($video->post_content));?>
			</div>
			<div style="padding-top: 56.17021276595745%;" data-ix="scroll-up-3" class="w-embed w-video web-link">
				<iframe class="embedly-embed" src="https://cdn.embedly.com/widgets/media.html?src=https%3A%2F%2Fwww.youtube.com%2Fembed%2FvEQQW79rDec%3Ffeature%3Doembed&amp;url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DvEQQW79rDec&amp;image=https%3A%2F%2Fi.ytimg.com%2Fvi%2FvEQQW79rDec%2Fhqdefault.jpg&amp;key=c4e54deccf4d4ec997a64902e9a30300&amp;type=text%2Fhtml&amp;schema=youtube" scrolling="no" frameborder="0" allowfullscreen=""></iframe>
			</div>
		</div>
	</div>
</div>
<div class="w-section media-accreditation">
	<div class="w-container">
		<h3 data-ix="scroll-up" class="h3">media accreditation section</h3>
		<?php $obj = getPostByTitle('Accreditation Home Text'); echo $obj->post_content;?>
		<div data-ix="scroll-up-3" class="button-div">
			<a href="<?php echo site_url();?>/accreditation" class="w-button button">Sign Up&nbsp;</a>
		</div>
	</div>
</div>
<?php $blogposts = getPostsByCategory("Blog post","publish",-1,0,"date","DESC");?>
<?php if(count($blogposts) > 0):?>
<div id="News-Sec" class="w-section news-sec">
	<h2>BLOGS</h2>
	<div data-animation="slide" data-duration="500" data-infinite="1" data-delay="4000" data-autoplay="1" class="w-slider slider">
		<div class="w-slider-mask slider-mask">
			<?php $blogposts = getPostsByCategory("Blog post","publish",-1,0,"date","DESC");?>
			<?php foreach($blogposts as $post):?>
			<div class="w-slide w-clearfix slide news-content">
				<div class="news-content">
					<a href="<?php echo $post->guid;?>" data-ix="scroll-up" class="w-inline-block content-link-block">
						<div class="img-mask">
							<?php if(get_the_post_thumbnail($post->ID, null, array('class'=>'thumb'))):?>
							<?php print_r(get_the_post_thumbnail($post->ID, null, array('class'=>'thumb')));?>
							<?php else:?>
							<img src="<?php echo get_template_directory_uri();?>/images/PiliPinas-Placeholder.jpg" class="thumb"/>
							<?php endif;?>
						</div>
						<div class="text-container">
							<h4 class="h4"><?php echo $post->post_title;?>&nbsp;</h4>
							<p>
                <?php $e = $post->post_excerpt;?>
                <?php if(strlen($e) > 110):?>
                  <?php echo substr($e, 0,107)."...";?>
                <?php else:?>
                  <?php echo $e;?>
                <?php endif;?>
              </p>
						</div>
						<div class="w-clearfix by-line">
							<div class="author"><?php echo the_author_meta( 'user_nicename' , $post->post_author ); ?> </div>
							<div class="date"><?php echo $post->post_date;?></div>
						</div>
					</a>
				</div>
			</div>
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
<div class="w-section sec-3">
	<div class="w-container container">
		<div class="white-text">
			<?php $obj = getPostByTitle("VCM Home Text"); echo $obj->post_content;?>
      <?php $vcmnews = current(getPostsByCategory("VCMNews","publish",1,0,"date","DESC"));?>
			<div data-ix="scroll-up-3" class="button-div">
				<a href="<?php echo $vcmnews->guid;?>" class="w-button button">Read more about VCM</a>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>