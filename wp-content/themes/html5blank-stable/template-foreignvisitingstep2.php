<?php /* Template Name: Accreditation ForeignVisiting Step2 Page Template */ get_header(); ?>
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
				<li>&#10004; Endorsement letter from Publisher, Editor-in-Chief, Assignment Editor, Station Manager, or similar officer of the newspaper, or television, radio station.&#10004;</li>
				<li>Front scan of your International Press Center (IPC) Card for the year corresponding to the filing of the application for accreditation.</li>
				<li>Back scan of your International Press Center (IPC) Card for the year corresponding to the filing of the application for accreditation.</li>
			</ol>
		</p>
		<?php echo do_shortcode('[wordpress_file_upload uploadid="2" uploadpath="uploads/accreditation/foreignvisiting/step2" fitmode="responsive" createpath="true" forcefilename="true" dublicatespolicy="maintain both" uniquepattern="datetimestamp" redirect="true" redirectlink="'.get_site_url().'/accreditation/foreignvisiting/step3/?filename1='.$_GET['filename'].'&filename2=%filename%" placements="filename+selectbutton/progressbar/uploadbutton"]');?>
	</div>
<?php get_footer(); ?>
