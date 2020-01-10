<?php
	require $_SERVER['DOCUMENT_ROOT'].'/views/layouts/head.php';
?>

<div class="container wrap row justify-content-center mt-4">
	<h1><?= $lang[$displayLang]['market'];?></h1>

	<div class="container">
		<div class="row p-2">
			<div class="card-deck">
				<?php foreach ($offers as $key => $value) : ?>
					<div class="row w-100">
						<a class="card m-2" href="/<?=$displayLang;?>/work/" style="text-decoration: none; color: black">
								<div class="card-body d-flex flex-column justify-content-center">
									<div class="row mx-auto">
										<h4 class="card-title"><?= $value['title']; ?></h5>
									</div>
									<div class="row p-4">
										<div class="col">
											<div class="row">
												<p><strong><?= $lang[$displayLang]['language'];?></strong></p>
											</div>
											<div class="row">
												<p class="card-text"><?= $value['language_id']; ?></p>
											</div>
										</div>
										<div class="col">
											<div class="row">
												<p><strong><?= $lang[$displayLang]['name'];?></strong></p>
											</div>
											<div class="row">
												<p class="card-text"><?= $value['name']; ?></p>
											</div>
										</div>
										<div class="col">
											<div class="row">
												<p><strong><?= $lang[$displayLang]['description'];?></strong></p>
											</div>
											<div class="row">
												<p class="card-text"><?= $value['description']; ?></p>
											</div>
										</div>
										<div class="col">
											<div class="row">
												<p><strong><?= $lang[$displayLang]['personalVal'];?></strong></p>
											</div>
											<div class="row">
												<p class="card-text"><?= $value['personal_valoration']; ?></p>
											</div>
										</div>
										<div class="col">
											<div class="row">
												<p><strong><?= $lang[$displayLang]['generalVal'];?></strong></p>
											</div>
											<div class="row">
												<p class="card-text"><?= $value['valoration_avg']; ?></p>
											</div>
										</div>
										<div class="col">
											<div class="row">
												<p><strong><?= $lang[$displayLang]['price'];?></strong></p>
											</div>
											<div class="row">
												<p class="card-text"><?= $value['coin_price']; ?></p>
											</div>
										</div>
									</div>
								</div>
						</a>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>



</div>

<?php require $_SERVER['DOCUMENT_ROOT'].'/views/layouts/footer.php';?>
