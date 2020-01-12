<?php
	require '../views/layouts/head.php';
?>

<div class="container wrap row justify-content-center mt-4">
	<h1><?= $lang[$displayLang]['market'];?></h1>
	<div class="container">
		<div class="row p-2">
			<div class="card-deck">
				<?php foreach ($offers as $key => $value) : ?>
					<div class="row w-100">
						<div class="container wrap row justify-content-center mt-4">
								<div class="container py-3">
									<div class="card">
										<div class="row">
											<div class="col-md-4">
												<img src="https://thumbs.dreamstime.com/b/uso-en-l%C3%ADnea-de-trabajo-de-la-red-de-internet-del-negocio-de-la-gente-46666160.jpg" class="img-fluid">
											</div>
											<div class="col-md-8 px-3">
												<div class="card-block px-3">
													<div class="d-flex justify-content-end px-4 pt-2">
														<p class="pr-4">PV : <strong><?= $value['personal_valoration']; ?></strong><p>
														<p>GV : <strong><?= $value['valoration_avg']; ?></strong><p>
													</div>
													<h4 class="card-title "><strong><?= $value['title']; ?></strong> (<em><?= $value['name']; ?></em>)</h4>
													<p class="card-text"><?= $value['description']; ?></p>
													<p><?= $lang[$displayLang]['price'];?> : <strong><?= $value['coin_price']; ?></strong></p>
													<div class="d-flex justify-content-end  pb-3 pr-3">
														<a href="/<?=$displayLang;?>/work/" class="btn btn-primary">Visit Work</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>

<?php require '../views/layouts/footer.php';?>
