<?php require 'layouts/head.php'; ?>

<?php if($userProfile == null ) : ?>
		<h1>THIS USER DOESN'T EXISTS</h1>
<?php else : ?>
<h1>Profile</h1>

<h3 class="display-4"><?php echo $userProfile->name . " " . $userProfile->surname . " " . $userProfile->surname_2; ?></h3>

<p><strong>EMAIL: </strong><?php echo $userProfile->email; ?></p>
<p><strong>MONEDAS: </strong><?php echo $userProfile->coins; ?></p>
<p><strong>PUNTOS: </strong><?php echo $userProfile->points; ?></p>

<a href="/edit-profile">Edit Profile</a>

<?php
endif;

require '../views/layouts/footer.php';?>


