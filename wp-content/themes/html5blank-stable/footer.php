	
<div id="Social-Media" class="w-section sec">
	<div class="w-container">
		<div class="news-container">
			<div class="w-clearfix title-div">
				<h3 class="float-left no-padding h3">social media</h3>
			</div>
		</div>
		<div class="w-row">
			<div class="w-col w-col-6">
				<div data-ix="scroll-up" class="content-link-block">
					<div data-duration-in="300" data-duration-out="100" class="w-tabs">
						<div class="w-tab-menu">
							<a data-w-tab="Tab 2" class="w-tab-link w--current w-inline-block tab-link">
								<div>#PiliPinas</div>
							</a>
							<a data-w-tab="Tab 1" class="w-tab-link w-inline-block tab-link">
								<div>Twitter Feed</div>
							</a>
						</div>
						<div class="w-tab-content">
							<?php $tag = current(getPostsByCategory("HomeTwitterTagFeed","publish",1,0,"date","DESC"));?>
							<?php $acct = current(getPostsByCategory("HomeTwitterAcctFeed","publish",1,0,"date","DESC"));?>
							<div data-w-tab="Tab 2" class="w-tab-pane w--tab-active">
								<div class="w-embed w-script">
									<?php echo html_entity_decode($tag->post_content);?>
								</div>
							</div>
							<div data-w-tab="Tab 1" class="w-tab-pane">
								<div class="w-embed w-script">
									<?php echo html_entity_decode($acct->post_content);?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="w-col w-col-6">
				<div data-ix="scroll-up-2" class="content-link-block">
					<div data-duration-in="300" data-duration-out="100" class="w-tabs">
						<div class="w-tab-menu">
							<a data-w-tab="Tab 2" class="w-tab-link w--current w-inline-block tab-link">
								<div>#PiliPinas</div>
							</a>
							<a data-w-tab="Tab 1" class="w-tab-link w-inline-block tab-link">
								<div>Instagram Feed</div>
							</a>
						</div>
						<div class="w-tab-content">
							<?php $tag = current(getPostsByCategory("HomeIGTagFeed","publish",1,0,"date","DESC"));?>
							<?php $acct = current(getPostsByCategory("HomeIGAcctFeed","publish",1,0,"date","DESC"));?>
							<div data-w-tab="Tab 2" class="w-tab-pane w--tab-active">
								<div class="w-embed w-iframe w-script">
									<!-- SnapWidget -->
									<?php echo html_entity_decode($tag->post_content);?>
								</div>
							</div>
							<div data-w-tab="Tab 1" class="w-tab-pane tab-pane-padding">
								<div class="w-embed w-iframe w-script">
									<!-- SnapWidget -->
									<?php echo html_entity_decode($acct->post_content);?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<footer class="w-section footer">
	    <div class="w-container container">
	      <div class="w-row">
	        <div class="w-col w-col-4">
	          <div>
	            <h4 class="h4">navigation</h4>
	            <a href="<?php echo get_site_url();?>" class="link">Home</a>
	            <a href="<?php echo getPageUrl('News');?>" class="link">News</a>
	            <a href="<?php echo getPageUrl('Blogs');?>" class="link">Blogs</a>
	            <a href="<?php echo getPageUrl('Upcoming Events');?>" class="link">Upcoming Events</a>
	            <a href="<?php echo getPageUrl("Videos");?>" class="link">Videos</a>
	            <a href="<?php echo getPageUrl('About');?>" class="link">About</a>
	            <a href="<?php echo getPageUrl('Accreditation');?>" class="link">Accreditation</a>
	            <a href="<?php echo get_site_url();?>/faqs/" class="link">FAQS</a>
	          </div>
	        </div>
	        <div class="w-col w-col-4">
	          <div>
	            <h4 class="h4">latest blogs</h4>
	            <?php $links = getPostsByCategory("Blog post","publish",7,0,'date','DESC');?>
	            <?php foreach($links as $link):?>
	            	<a href="<?php echo $link->guid;?>" class="link"><?php echo $link->post_title;?></a>
	        	<?php endforeach;?>
	          </div>
	        </div>
	        <div class="w-col w-col-4">
	          <h4 class="h4">contact</h4>
	          <div class="w-form">
	            <form id="email-form" name="email-form" data-name="Email Form">
	              <input id="name-2" type="text" placeholder="Enter your name" name="name-2" data-name="Name 2" class="w-input">
	              <input id="email-2" type="email" placeholder="Enter your email address" name="email-2" data-name="Email 2" required="required" class="w-input">
	              <textarea id="field-2" placeholder="Your message here" name="field-2" data-name="Field 2" class="w-input"></textarea>
	              <input type="submit" value="Submit" data-wait="Please wait..." class="w-button button">
	            </form>
	            <div class="w-form-done">
	              <p>Thank you! Your submission has been received!</p>
	            </div>
	            <div class="w-form-fail">
	              <p>Oops! Something went wrong while submitting the form</p>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	    <div class="copyright-footer">
	      <div class="w-container">
	        <div>Copyright PiliPinas 2015</div>
	      </div>
	    </div>
	  </footer>
	  <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/webflow.js"></script>
	  <script type="text/javascript">
	  	var frames = document.getElementsByTagName("IFRAME");
	  	for(var i = 0; i < frames.length; i++) {
	  		frames[i].removeAttribute("width");
	  		frames[i].style.width = "100%";
	  		frames[i].style.maxWidth = "560px";
	  	}
	  </script>
	  <!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>