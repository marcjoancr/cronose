<?php require 'layouts/head.php'; ?>

<?php if(count($dataController['user']) == null ) : ?>
		<h1>THIS USER DOESN'T EXISTS</h1>
<?php else : ?>

<h1>ProfiLe</h1>

<h3 class="display-4"><?php echo $dataController['user'][0]['name'] . " " . $dataController['user'][0]['surname'] . " " . $dataController['user'][0]['surname_2'];; ?></h3>

<p><strong>EMAIL: </strong><?php echo $dataController['user'][0]['email']; ?></p>
<p><strong>MONEDAS: </strong><?php echo $dataController['user'][0]['coins']; ?></p>
<p><strong>PUNTOS: </strong><?php echo $dataController['user'][0]['points']; ?></p>

<a href="/edit-profile">Edit Profile</a>

<?php 
endif;

require $_SERVER['DOCUMENT_ROOT'].'/views/layouts/footer.php';?>


