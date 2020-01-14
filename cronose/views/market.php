<?php
	require '../views/layouts/head.php';
?>

<div class="container wrap row justify-content-center mt-4">
	<h1><?= $lang[$displayLang]['market'];?></h1>
	<div class="container">
		<div class="row p-2">
      <div class="col-lg-11 pt-4 pb-4">
        <div class="input-group">
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="button"><i class="fas fa-search"></i></button>
          </span>
          <input type="text" class="form-control">
        </div>
      </div>
			<div class="card-deck w-100" id="works">
				<script>
				  $(document).ready(function(){
				    const url = (window.location.pathname.split('/')[3]) ? '/api/works/'+window.location.pathname.split('/')[3] : '/api/works' ;
				    showWorks();
				    function showWorks() {
				      var xmlhttp = new XMLHttpRequest();
				      xmlhttp.onreadystatechange = function() {
				        if (this.readyState == 4 && this.status == 200) {
				          var works = JSON.parse(this.responseText);
                  console.log(works);
									var body =  "";
									for(x in works){
										console.log(works[x]);
										body+='<div class="row w-100"><div class="container wrap row justify-content-center mt-4"><div class="container py-3"><div class="card"><div class="row"><div class="col-md-4">';
										body+='<img src="https://thumbs.dreamstime.com/b/uso-en-l%C3%ADnea-de-trabajo-de-la-red-de-internet-del-negocio-de-la-gente-46666160.jpg" class="img-fluid" style="height: 222.8px;">';
										body+='</div><div class="col-md-8 px-3"><div class="card-block px-3"><div class="d-flex justify-content-end px-4 pt-2">';
										body+='<p class="pr-4">PV : <strong>'+works[x].personal_valoration+'</strong><p>';
										body+='<p>GV : <strong>'+works[x].valoration_avg+'</strong><p></div>';
										body+='<h4 class="card-title "><strong>'+works[x].title+'</strong> (<em>'+works[x].name+'</em>)</h4>';
										body+='<p class="card-text">'+works[x].description+'</p>';
										body+='<p><?= $lang[$displayLang]['price'];?> : <strong>'+works[x].coin_price+'</strong></p><div class="d-flex justify-content-end  pb-3 pr-3">';
										body+='<a href="/<?=$displayLang;?>/work/" class="btn btn-primary"><?= $lang[$displayLang]['seeWork'];?></a></div></div></div></div></div></div></div></div>';
									}
									document.getElementById("works").innerHTML = body;
				        }
				      }
				      xmlhttp.open("GET", url, false);
				      xmlhttp.send();
				    };
				  });
				</script>
			</div>
		</div>
	</div>
</div>

<?php require '../views/layouts/footer.php';?>
