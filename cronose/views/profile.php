<?php require 'layouts/head.php'; ?>

<?php if(count($user['0']) == null ) : ?>
		<h1>THIS USER DOESN'T EXISTS</h1>
<?php else : ?>

<h1>ProfiLe</h1>

<h3 class="display-4"><?php echo $user['name'] . " " . $user['surname'] . " " . $user['surname_2']; ?></h3>

<p><strong>EMAIL: </strong><?php echo $user['email']; ?></p>
<p><strong>MONEDAS: </strong><?php echo $user['coins']; ?></p>
<p><strong>PUNTOS: </strong><?php echo $user['points']; ?></p>

<a href="/edit-profile">Edit Profile</a>

<?php
endif;

require $_SERVER['DOCUMENT_ROOT'].'/views/layouts/footer.php';?>


