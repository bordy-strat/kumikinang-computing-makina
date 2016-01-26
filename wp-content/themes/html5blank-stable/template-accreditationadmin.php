<?php
	/* Template Name: Accreditation Admin Page Template */
	if(is_user_logged_in()){
		$user = wp_get_current_user();
		$roles = $user->roles;
		if(!in_array("administrator",$roles)){
			echo "Only Administrators can access this page";
			die();
		}
	}else{
		header('Location: '.wp_login_url( site_url("/accreditation/admin/") ));
		die();
	}
	get_header(); 
?>
	<div class="w-section single-header">
		<div class="single-article-header">
		<div class="overlay-text">
			<div class="w-container">
				<h1>Media Accreditation Application Form</h1>
			</div>
		</div>
			<?php the_post_thumbnail("full",array('class'=>'singleheader-img'));?>
		</div>
	</div>
<?php if(!isset($_REQUEST['id'])):?>
	<div class="w-container">
		<br/>
		<?php $map = getAccreditationApplications();?>
		<table id="accreditationTable">
			<thead>
				<tr>
					<th>Name</th>
					<th>Position</th>
					<th>Organisation</th>
					<th>Application Type</th>
					<th>Email</th>
					<th>Status</tjh>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($map as $item):?>
				<tr>
					<td><?php echo $item->lastName.", ".$item->firstName." ".$itemp->middleName;?></td>
					<td><?php echo $item->workPosition;?></td>
					<td><?php echo $item->workEmployer;?></td>
					<td>
						<?php 
							switch($item->userType){
								case "localtv": echo "Local TV, Print, or Radio Publication"; break;
								case "localonline": echo "Online Publication or Blog Writer"; break;
								case "freelancer": echo "Freelance"; break;
								case "foreignmanila": echo "Manila-based Foreign Media"; break;
								case "foreignvisiting": echo "Visiting Foreign Meida"; break;
							}
						?>
					</td>
					<td><?php echo $item->workEmail;?></td>
					<td>
						<?php 
							switch($item->applicationStatus){
								case 0: echo "Pending"; break;
								case -1: echo "Denied"; break;
								case 1: echo "Approve"; break;
							}
						?>
					</td>
					<td><a href="<?php echo get_site_url();?>/accreditation/admin/?id=<?php echo $item->ID;?>">View</a></td>
				</tr>
				<?php endforeach;?>
			</tbody>
			<tfoot></tfoot>
		</table>
		<?php echo do_shortcode('[wp_jdt id="accreditationTable"]');?>
		<br/>
	</div>
<?php else:?>
<?php $item = getAccreditationApplications($_REQUEST['id']);?>
<?php $uploadDir = wp_upload_dir();?>
<div class="w-container">
	<br/>
	<p><a href="<?php echo get_site_url();?>/accreditation/admin/"> < View all</a></p>
	<br/>
	<div class="w-row">
		<div class="w-col w-col-8">
			<div class="w-row">
				<h5>Name</h5>
				<p><?php echo $item->lastName.", ".$item->firstName." ".$item->middleName;?></p>
			</div>
			<div class="w-row">
				<div class="w-col w-col-4">
					<h5>Date of Birth</h5>
					<p><?php echo $item->yearOfBirth."-".$item->dayOfBirth."-".$item->monthOfBirth;?></p>
				</div>
				<div class="w-col w-col-4">
					<h5>Place of Birth</h5>
					<p><?php echo $item->placeOfBirth;?></p>
				</div>
				<div class="w-col w-col-4">
					<h5>Status</h5>
					<p><?php echo $item->civilStatus;?></p>
				</div>
			</div>
			<div class="w-row">
				<h5>Residence</h5>
				<p><?php echo $item->residenceCity.", ".$item->residenceProvince."<br/>Contact no: ".$item->residenceContact;?></p>
			</div>
		</div>
		<div class="w-col w-col-4">
			<img src="<?php echo $uploadDir['baseurl'];?>/accreditationuserimages/<?php echo $item->userType;?>/<?php echo rawurlencode($item->userImageFilename);?>" />
		</div>
	</div>
	<div class="w-row">
		<div class="w-row">
			<div class="w-col w-col-4">
				<h5>Position / Designation</h5>
				<p><?php echo $item->workPosition;?></p>
			</div>
			<div class="w-col w-col-4">
				<h5>Organisation</h5>
				<p><?php echo $item->workEmployer;?></p>
			</div>
			<div class="w-col w-col-4">
				<h5>Email Address</h5>
				<p><?php echo $item->workEmail;?></p>
			</div>
		</div>
		<div class="w-row">
			<div class="w-col w-col-4">
				<h5>Name of Editor / Station Manager</h5>
				<p><?php echo $item->workManagerLastName.', '.$item->workManagerFirstName.' '.$item->workManagerMiddleName;?></p>
			</div>
			<div class="w-col w-col-4">
				<h5>Busines Address</h5>
				<p><?php echo $item->workAddressCity;?></p>
			</div>
			<div class="w-col w-col-4">
				<h5>Telephone Nos</h5>
				<p><?php echo $item->workContact;?></p>
			</div>
		</div>
		<div class="w-row">
			<div class="w-col w-col-12">
				<div class="w-row">
					<h5>Places to Visit</h5>
					<p><?php echo $item->workPlaces;?></p>
				</div>
			</div>
		</div>
		<div class="w-row">
			<h5>Requirements</h5>
			<iframe height="600px" class="w-col w-col-12" src="<?php echo $uploadDir['baseurl'];?>/accreditation/<?php echo $item->userType;?>/step1/<?php echo rawurlencode($item->userRequirementFilename1);?>" target="_blank"></iframe>
			<?php if($item->userRequirementFilename2 != ""):?>
			<iframe height="600px" class="w-col w-col-12" src="<?php echo $uploadDir['baseurl'];?>/accreditation/<?php echo $item->userType;?>/step2/<?php echo rawurlencode($item->userRequirementFilename2);?>" target="_blank"></iframe>
			<?php endif;?>
			<?php if($item->userRequirementFilename3 != ""):?>
			<iframe height="600px" class="w-col w-col-12" src="<?php echo $uploadDir['baseurl'];?>/accreditation/<?php echo $item->userType;?>/step3/<?php echo rawurlencode($item->userRequirementFilename3);?>" target="_blank"></iframe>
			<?php endif;?>
			<?php if($item->userRequirementFilename4 != ""):?>
			<iframe height="600px" class="w-col w-col-12" src="<?php echo $uploadDir['baseurl'];?>/accreditation/<?php echo $item->userType;?>/step4/<?php echo rawurlencode($item->userRequirementFilename4);?>" target="_blank"></iframe>
			<?php endif;?>
		</div>
	</div>
	<br/>
	<div class="w-row">
		<button class="file_input_submit" id="approveButton" type="button" onclick="status(1)">Approve</button>
		<button class="file_input_submit" id="disapproveButton" type="button" onclick="status(-1)">Disapprove</button>
	</div>
	<br/>
	<p><a href="<?php echo get_site_url();?>/accreditation/admin/"> < View all</a></p>
	<br/>
</div>
<script type="text/javascript">
	function status(x){
		$.post(
			"<?php echo admin_url('admin-ajax.php'); ?>", 
			{
				'action': 'accreditationstatus',
				'data':   {'status':x,'id':<?php echo $item->ID;?>}
			}, 
			function(response){
				var x = JSON.parse(response);
				alert(x['msg']);
			}
		);
	}
</script>
<?php endif;?>
<?php get_footer(); ?>
