<?php require '../views/layouts/head.php'; ?>
<body>
	<div class="container wrap row justify-content-center boder shadow" style="margin-top: 20px;">
		<h1 class="mb-4 mt-4">About us</h1>
		<p class="ml-4"><?= $lang[$displayLang]['aboutUsText'];?></p>
		<div class="mb-4 mt-4"id="MyMap" style="width:950px;height:400px;"></div>
	</div>
	<script>

		var mapa = L.map('MyMap').setView([39.561627,3.199883],16);

		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
				attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
				maxZoom: 20,
				id: 'mapbox.light',
				accessToken: 'pk.eyJ1IjoibWVuYTciLCJhIjoiY2szeThhZHUyMGlwNDNscDZoYmc1ZnMweiJ9.lTy9NAE_I_tyg7Xt04pihw'
		}).addTo(mapa);

		var point = L.marker([39.5616104,3.200250]).addTo(mapa);

		point.bindPopup("<b>Aqui Estamos!</b>").openPopup();

	</script>
<?php require '../views/layouts/footer.php';?>
