$(document).ready(function () {

// za pronalazenje vesti, ajax

$("#txt").keyup(function(){
    var vrednost = $("#txt").val();

    $.get("suggest.php", { unos: vrednost },
       function(data){
        $("#livesearch").show();
        $("#livesearch").html (data);
       });
    });
    $("#sub").click(function(){
    var vrednost = $("#txt").val();
    $.get("pronadjivest.php", { naslov: vrednost },
       function(data){
        $("#prikaz_rezultata").html (data);
       });
    });

    //pocasni clanovi

    $('#clanovi-dropdown').on('change', function() {
      var user_id = this.value;
      $.ajax({
          url: "showUser.php",
          type: "POST",
          data: {
              user_id: user_id
          },
          cache: false,
          success: function(response) {
              $('#message').html(response);
              
          }
      });
  });




    });
   
  