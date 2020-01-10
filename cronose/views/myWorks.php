<?php require $_SERVER['DOCUMENT_ROOT'].'/views/layouts/head.php'; ?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<div class="container wrap row justify-content-center mt-4">
		<h1><?= $lang[$displayLang]['myOffers'];?></h1>
    <div class="container">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <?php foreach ($dataController['offers'] as $key => $value): ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key ?>"></li>
          <?php endforeach ?>
        </ol>
        <div class="carousel-inner">
          <?php foreach ($dataController['offers'] as $key => $value): ?>
            <div class="carousel-item <?php if ($key == 0) echo "active" ?>">
              <img class="d-block w-100" src="../assets/img/<?php echo $value["media"] ?>" class="active" <?php if ($key == 0) echo 'class="active"' ?>>
              <div class="carousel-caption d-none d-md-block">
                <div style="background-color: rgba(255, 255, 255, 0.8)">
                <h5 class="text-dark"><?php echo $value["title"] ?><h5>
                <p class="text-dark"><?php echo $value["description"] ?></p>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
	</div>

	<a href="/new-work" style="display: block;">Nova publicació</a>
	<a href="/work">Edita publicació</a>

<?php require '../views/layouts/footer.php';?>