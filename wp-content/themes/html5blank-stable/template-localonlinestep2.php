<?php /* Template Name: Accreditation Localonline Step2 Page Template */ get_header(); ?>
	<div class="w-section single-header">
		<div class="single-article-header">
		<div class="overlay-text">
			<div class="w-container">
				<h1><?php the_title();?></h1>
			</div>
		</div>
			<?php the_post_thumbnail("full",array('class'=>'singleheader-img'));?>
		</div>
	</div>
	<div class="accredit-user">
    <div class="w-container">
		<p>
			Please submit the following before you can proceed to fill-up the Media Accreditation Form:
			<ol>
				<li>&#10004;Endorsement letter from Publisher, Editor-in-Chief, Assignment Editor, Station Manager, or similar officer of the online publication employing the applicant.&#10004;</li>
				<li>Document with URL of the stated online publication or blog showing the applicant’s name or listing the applicant as a part of the reporting team for that site, and copy of regular online articles or blogs, by-lined, published, on the applicant’s or similar online sites or blogs, in the last six months related to the topic of politics, elections, governance or other related topics.</li>
			</ol>
			<br/>
			Requirements not needed to be uploaded:
			<ol>
				<li>The website or online publication should be updated at least once per week with content which is original, dated and extends beyond links and forums.</li>
				<li>No personal websites, fan sites, forums and sites containing personal diaries will be eligible for accreditation. Only website editors and writers qualify for accreditation.</li>
				<li>Blogs must also be well established, updated at least once every two weeks, contain content on politics, elections, or related topics, and show an acceptable level of readership. Commercial or company blogs do not meet the criteria for press accreditation.</li>
			</ol>
			<br/>
			Please put all requirements into one PDF file, and save it as "LASTNAME, FIRSTNAME.pdf". Ex. "DELA CRUZ, JUAN.pdf"
			You will be redirected to the accreditation form page after uploading your requirements.
		</p>
		<?php echo do_shortcode('[wordpress_file_upload uploadid="2" uploadpath="uploads/accreditation/localonline/step2" fitmode="responsive" createpath="true" forcefilename="true" dublicatespolicy="maintain both" uniquepattern="datetimestamp" redirect="true" redirectlink="'.get_site_url().'/accreditation/form/?filename1='.$_GET['filename'].'&filename2=%filename%&type=localonline" placements="filename+selectbutton/progressbar/uploadbutton"]');?>
	</div>
<?php get_footer(); ?>
