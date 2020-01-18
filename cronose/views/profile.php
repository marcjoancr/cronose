<?php require 'layouts/head.php'; ?>

<h1 id="title"></h1>
<div id="profile"></div>

<script>
  $(document).ready(function(){

    showProfile();
    function showProfile() {
      const url = (window.location.pathname.split('/')[3] || window.location.pathname.split('/')[2] != 'profile') ? '/api/user/'+window.location.pathname.split('/')[3] + '/' + +window.location.pathname.split('/')[4] : '/api/user' ;

      $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        data: {},
        success: (data) => {
          console.log(data);
          if (data.status == 'success') {
            let profile = data.profile;
            let achievements = data.achievement;

            let rowDIV = $("<div/>",{class:"row",});

            let name = profile.name + " " + profile.surname + " " + profile.surname_2;

            let cardBody = $("<div/>",{class:"card-body"});
            let cardName = $("<h4/>",{class:"card-title", text:name});
            let cardP = $("<p/>",{class:"card-text"});
            let cardEmailTitle = $("<b/>",{class:"card-text", text:"Email: "});
            let cardEmail = $("<span/>",{class:"card-text", text:profile.email});
            let cardCoinsTitle = $("<b/>",{class:"card-text", text:"Coins: "});
            let cardCoins = $("<span/>",{class:"card-text", text:profile.coins});
            let cardPointsTitle = $("<b/>",{class:"card-text", text:"Points: "});
            let cardPoints = $("<span/>",{class:"card-text", text:profile.points});

            cardP.append(cardEmailTitle, cardEmail, $("<br/>"), cardCoinsTitle, cardCoins, $("<br/>"), cardPointsTitle, cardPoints);
            cardBody.append(cardName, cardP);

            let array = [];

            for (let x = 0; x < 5 ; x++){
              array[x] = ( achievements[x] != null ) ? achievements[x].achievement_id : null;
            }


            let i = 0;
            let newDIV2 = $("<div/>",{class:'row h-10'});
            for (let x = 1; x <= 5 ; x++){
              let newDIV3 = $("<div/>",{class: 'col'});
              let photo = "/assets/img/a"+x;

              if ( x == 1 || x == 5)
                photo = photo + ".svg";
              else
                photo = photo + ".png";

              //comprobar si el logro está en el array haga newIMG normal, si no está que la cree con class: 'opacity-30'
              
              if( array[i] == x ){
                var newIMG = $("<img/>",{src:photo, alt:photo, class: 'w-100'});
                i++;
              }else{
                var newIMG = $("<img/>",{src:photo, alt:photo, class: 'w-100 opacity'});
              }
              
              newDIV3.append(newIMG);
              newDIV2.append(newDIV3);
            }
            cardBody.append(newDIV2);
            $("#profile").append(cardBody);
            $("#title").append('Profile');

            if (window.location.pathname.split('/')[3] && window.location.pathname.split('/')[3] != '<?=$user->name;?>') {
              cardP.append($("<br/><a href='/" + window.location.pathname.split('/')[1] + "/chat/"+ window.location.pathname.split('/')[3] + "/" + window.location.pathname.split('/')[4] +"'>Chat</a>"))
              cardBody.append(cardName, cardP/*, newDIV*/);

              $("#profile").append(cardBody);

            } else {
              $("#profile").html(data.msg);
            }
          } else {
            // $("#profile").html(data.msg);
            showUsers();
          }
        },
        error: ((data) => {
          console.log(data);
        })
      });
    };

    function showUsers() {
      const url = (window.location.pathname.split('/')[2] != 'profile') ? '/api/user/'+window.location.pathname.split('/')[3] : '/api/user' ;
      $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        data: {},
        success: (data) => {
          console.log(data);
          if (data.status == 'success') {
          
            $('#title').append('Users');
            htmlLi = '<ul class="list-unstyled">';
            $.each (data.users, function(key, value) {
              console.log(value.name);
              htmlLi += '<a href="/' + window.location.pathname.split('/')[1] + '/user/' + value.initials  + '/'+ value.tag + '" title=""><strong>' + value.name + ' ' + value.surname + '</strong></a></br>';
            });
            htmlLi += "</ul>"
            document.getElementById("profile").innerHTML = htmlLi;
            // $('profile').append(htmlLi);

          }
        },
        error: ((data) => {
          console.log(data);

        })
      });
    }



  });
</script>

<?php require '../views/layouts/footer.php';?>
