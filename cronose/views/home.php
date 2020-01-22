<?php require 'layouts/head.php';?>

<h1>Home</h1>


<script>

  $(document).ready(function(){

    showWorks();
		function showWorks() {
      const url = (window.location.pathname.split('/')[3]) ? '/api/category/'+window.location.pathname.split('/')[3] : '/api/category' ;
      $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        data: {},
        success: (data) => {
          if (data.status == 'success') {
            console.log(data);
          };
        },
        error: ((data) => {
          console.log(data);
        })
      });
    };
  });

</script>


<?php '../views/layouts/footer.php';?>
