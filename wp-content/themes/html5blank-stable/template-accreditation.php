<?php /* Template Name: Accreditation Page Template */ get_header(); ?>
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
		<div class="form">
			<form action="" method="POST" name="user-type-form" id="user-type-form">
				<label for="user-type-select">Select User Type</label>
				<select id="user-type-select" name="user-type" class="w-select">
					<option value="noneselect">Select user type</option>
					<option value="localtv" <?php echo ( isset($_POST['user-type']) && strcmp("localtv", $_POST['user-type']) === 0 )?'selected':"";?> >Local TV, Print, or Radio Publication</option>
					<option value="localonline" <?php echo ( isset($_POST['user-type']) && strcmp("localonline", $_POST['user-type']) === 0 )?'selected':"";?> >Online Publication or Blog Writer</option>
					<option value="freelancer" <?php echo ( isset($_POST['user-type']) && strcmp("freelancer", $_POST['user-type']) === 0 )?'selected':"";?> >Freelance</option>
					<option value="foreignvisiting" <?php echo ( isset($_POST['user-type']) && strcmp("foreignvisiting", $_POST['user-type']) === 0 )?'selected':"";?> >Visiting Foreign Media</option>
					<option value="foreignmanila" <?php echo ( isset($_POST['user-type']) && strcmp("foreignmanila", $_POST['user-type']) === 0 )?'selected':"";?> >Manila-based Foreign Media</option>
				</select>
			</form>
		</div>
	</div>
	<div class="w-container">
	<?php if( !isset($_GET['file']) && isset($_POST['user-type']) && strcmp("noneselect", $_POST['user-type']) !== 0 ):?>
		<?php
			switch($_POST['user-type']){
				case "localtv": get_template_part("mapform","localtv"); break;
				case "localonline": get_template_part("mapform","localonline"); break;
				case "freelancer": get_template_part("mapform","freelancer"); break;
				case "foreignvisiting": get_template_part("mapform","foreignvisiting"); break;
				case "foreignmanila": get_template_part("mapform","foreignmanila"); break;
				default: break;
			}
		?>
	<?php endif;?>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#user-type-select').on("change",function(){
				$('#user-type-form').submit();
			});
		});
	</script>
<?php get_footer(); ?>
