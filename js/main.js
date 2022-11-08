$(document).ready(function () {

// za pronalazenje vesti

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

    });
   
  