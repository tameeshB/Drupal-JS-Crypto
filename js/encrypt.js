//cryptController.js
// document.getElementById("edit-show").addEventListener("click", function(event){
//     event.preventDefault();
//     alert(document.getElementById("edit-data").value);
// });
// Jquery wrapper for drupal to avoid conflicts between libraries.
(function ($) {
  // Jquery onload function.
  $(document).ready(function(){
    if (!localStorage.getItem("pubKey")){
	    // var pubKey = localStorage.getItem("pubKey");
	    $(".putdataform").hide();
	    $("#block-bartik-content .content").append("<br><b><font color='#f46841'>You need to generte a key pair before encrypting data<br><a href='gen'>Generate Keys</a></font></b>");
      }
    $("#edit-show").click(function(event){
	  event.preventDefault();
      var crypt = new JSEncrypt();
      crypt.setPrivateKey(localStorage.getItem("privKey"));
      // var pubkey = $('#edit-pubKey').val();
      var pubkey = localStorage.getItem("pubKey");
      
      var input = $('#edit-data').val();
      if (input) {
      	var cipherText=crypt.encrypt(input)
        console.log(cipherText);
	    localStorage.setItem("cipher",cipherText);
        $('#edit-data').val('Encrypted!');
	    $("#block-bartik-content .content").append("<br><b><font color='#55ba1b'>Data encrypted!<br><a href='view'>View it here</a></font></b>");

      }else{
        $('#edit-data').val('Data field can\'t be empty.');
      }
    	
    });
  });
})(jQuery); 

