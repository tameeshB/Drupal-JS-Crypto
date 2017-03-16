//cryptController.js
// document.getElementById("edit-show").addEventListener("click", function(event){
//     event.preventDefault();
//     alert(document.getElementById("edit-data").value);
// });
// Jquery wrapper for drupal to avoid conflicts between libraries.
(function ($) {
  // Jquery onload function.
  $(document).ready(function(){
    // Your JS code.
	  event.preventDefault();
      var crypt = new JSEncrypt();
      crypt.setPrivateKey(localStorage.getItem("privKey"));

      var crypted = localStorage.getItem("cipher");
      var pubKey = localStorage.getItem("pubKey");
      // var pubkey = $('#edit-pubKey').val();
     //  if (!pubkey) {
     //    // $('#pubkey').val(crypt.getPublicKey());
	    // // var pubKey = localStorage.getItem("pubKey");
     //  }
     if(!localStorage.getItem("privKey")){
        $('#block-bartik-content .content').append('<br><b>Private Key not present.</b>');
      }else{

      if (crypted) {
        var decrypted = crypt.decrypt(crypted);
        console.log(decrypted);
        if (!decrypted){
          $('#block-bartik-content .content').append('<br>Error in decryption.');
        }else{
          $('#block-bartik-content .content').append('<br><font color="#1c64d8">'+decrypted+'</font></b>');
        }
      }else{
        $('#block-bartik-content .content').append('<br>No data to decrypt.');
      }

      }
  });
})(jQuery); 

