<?php if (!isset($_SESSION['user'])) header('Location: ../index.php'); ?>
<?php require $_SERVER['DOCUMENT_ROOT'].'/views/layouts/head.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/assets/php/DB.php'; ?>
<!-- REPASAR require_once NO FUNCINA SINO -->

	<div class="container wrap row justify-content-center mt-4">
		<h1><?= $lang[$displayLang]['myOffers'];?></h1>
		<table class="table align-items-center mt-4 table-bordered">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">User Id</th>
		      <th scope="col">Specialization ID</th>
		      <th scope="col">Title</th>
		      <th scope="col">Valoration Average</th>
					<th scope="col">Personal Valoration</th>
					<th scope="col">Coin Price</th>
					<th scope="col">Description</th>
					<th scope="col">Keywords</th>
		    </tr>
		  </thead>
		  <tbody>
				<?php $res = DB::getOffersByUsername($_SESSION['user']->getUsername());?>
				<?php foreach ($res as $valor): ?>
					<tr>
						<th><?php echo $valor[0]; ?></th>
						<th><?php echo $valor[1]; ?></th>
						<th><?php echo $valor[2]; ?></th>
						<th><?php echo $valor[3]; ?></th>
						<th><?php echo $valor[4]; ?></th>
						<th><?php echo $valor[5]; ?></th>
						<th><?php echo $valor[6]; ?></th>
						<th><?php echo $valor[7]; ?></th>
					</tr>
				<?php endforeach; ?>
		  </tbody>
		</table>


	</div>

<?php require $_SERVER['DOCUMENT_ROOT'].'/views/layouts/footer.php';?>
