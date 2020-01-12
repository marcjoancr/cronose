<?php require 'layouts/head.php'; ?>

<h1>Profile</h1>
<div id="profile"></div>

<script>
  $(document).ready(function(){

    const url = (window.location.pathname.split('/')[3]) ? '/api/profile/'+window.location.pathname.split('/')[3] : '/api/profile' ;

    showProfile();


    function showProfile() {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var status = JSON.parse(this.responseText)['status'];
          if (status == "success") {
            let profile = JSON.parse(this.responseText)['profile'];
            let achievements = JSON.parse(this.responseText)['achievement'];
              console.log(achievements);

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

              let array = [];
              
              for (let x = 0; x < 5 ; x++){
                array[x] = ( achievements[x] != null ) ? achievements[x].achievement_id : null;
                console.log(array[x]);
              }

              for (let x = 0; x < 5 ; x++){
                let newDIV = $("<div/>");
                let foto = "../public/assets/img/a"+x;

                if ( x == 1 || x == 5)
                  foto = foto + ".svg";
                else
                  foto = foto + ".png";

                var newIMG = $("<img/>",{src:foto, alt:foto})
                newDIV.append(newIMG);
              }

              //let achievement = 


              cardP.append(cardEmailTitle, cardEmail, $("<br/>"), cardCoinsTitle, cardCoins, $("<br/>"), cardPointsTitle, cardPoints);


              if (window.location.pathname.split('/')[3])
              cardP.append($("<br/><a href='/" + window.location.pathname.split('/')[1] + "/chat/"+ window.location.pathname.split('/')[3] + "'>Chat</a>"))
              cardBody.append(cardName, cardP);

              $("#profile").append(cardBody);

          } else {
            $("#profile").html(JSON.parse(this.responseText)['msg']);
          }
        }
      }
      xmlhttp.open("GET", url, false);
      xmlhttp.send();
    };
  });
</script>

<?php require '../views/layouts/footer.php';?>
