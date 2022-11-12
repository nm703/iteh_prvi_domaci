<?php 
	include ('includes/header.php');
 ?>

	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script>
	
		function posaljiKontakt() {
			var valid;	
			valid = proveriKontakt();
			if(valid) {
				jQuery.ajax({
				url: "contact_mail.php",
				data:'&userEmail='+$("#userEmail").val()+'&subject='+$("#subject").val()+'&content='+$(content).val(),
				type: "POST",
				success:function(data){
				$("#mail-status").html(data);
				},
				error:function (){}
				});
			}
		}

function proveriKontakt() {
	var ispravna = true;	
	$(".demoInputBox").css('background-color','');
	$(".info").html('');
	
	if(!$("#userEmail").val()) {
		$("#userEmail-info").html("(obavezno)");
		$("#userEmail").css('background-color','#FFCCCB');
		ispravna = false;
	}
	if(!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
		$("#userEmail-info").html("(neispravno)");
		$("#userEmail").css('background-color','#FFFFE0');
		ispravna = false;
	}
	if(!$("#subject").val()) {
		$("#subject-info").html("(obavezno)");
		$("#subject").css('background-color','#FFCCCB');
		ispravna = false;
	}
	if(!$("#content").val()) {
		$("#content-info").html("(obavezno)");
		$("#content").css('background-color','#FFCCCB');
		ispravna = false;
	}
	
	return ispravna;
}
</script>
<div id="frmContact">
   <h2>Pišite nam!</h2>
   <div>
      <label>Email</label>
      <span id="userEmail-info" class="info"></span><br/>
      <input type="text" name="userEmail" id="userEmail" class="demoInputBox">
   </div>
   <div>
      <label>Subject</label> 
      <span id="subject-info" class="info"></span><br/>
      <input type="text" name="subject" id="subject" class="demoInputBox">
   </div>
   <div>
      <label>Poruka</label> 
      <span id="content-info" class="info"></span><br/>
      <textarea name="content" id="content" class="demoInputBox" cols="60" rows="6"></textarea>
   </div>
   <div>
      <button name="submit" class="btnAction btn-info" onClick="posaljiKontakt();">Pošalji</button>
   </div>
   <br>
   <div id="mail-status"></div>
   <br>
</div>


<?php 
	include ('includes/footer.php');
 ?>

