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
				<?php $res = DB::getAllOffers();?>
				<?php foreach ($res as $valor): ?>
					<tr>
						<th><?= $valor[0]; ?></th>
						<th><?= $valor[1]; ?></th>
						<th><?= $valor[2]; ?></th>
						<th><?= $valor[3]; ?></th>
						<th><?= $valor[4]; ?></th>
						<th><?= $valor[5]; ?></th>
						<th><?= $valor[6]; ?></th>
					</tr>
				<?php endforeach ?>
		  </tbody>
		</table>

	</div>
	 <?php if (isset($_SESSION['user'])):?>
	<a href="/work">Publicació</a>
	<?php endif; ?>

<?php require $_SERVER['DOCUMENT_ROOT'].'/views/layouts/footer.php';?>
