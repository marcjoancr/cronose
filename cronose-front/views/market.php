<?php require $_SERVER['DOCUMENT_ROOT'].'/views/layouts/head.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/DB.php'; ?>
<!-- REPASAR require_once NO FUNCINA SINO -->

<div class="container wrap row justify-content-center mt-4">
	<h1><?= $lang[$displayLang]['market'];?></h1>
	<table class="table align-items-center mt-4 table-bordered">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">Lang</th>
		      <th scope="col">User</th>
		      <th scope="col">Title</th>
		      <th scope="col">Description</th>
          <th scope="col">Personal Valoration</th>
          <th scope="col">Valoration</th>
          <th scope="col">Coin Price</th>
		    </tr>
		  </thead>
		  <tbody>
				<?php foreach ($data['offers'] as $key => $value) : ?>
					<tr>
						<th><?= $value['translation']; ?></th>
						<th><?= $value['name']; ?></th>
						<th><?= $value['title']; ?></th>
						<th><?= $value['description']; ?></th>
						<th><?= $value['personal_valoration']; ?></th>
						<th><?= $value['valoration_avg']; ?></th>
						<th><?= $value['coin_price']; ?></th>
					</tr>
				<?php endforeach ?>
	  </tbody>
	</table>
</div>

<?php if (isset($_SESSION['user'])):?>
<a href="/work">Publicació</a>
<?php endif; ?>

<?php require $_SERVER['DOCUMENT_ROOT'].'/views/layouts/footer.php';?>
