// Jquery wrapper for drupal to avoid conflicts between libraries.
(function ($) {
  // Jquery onload function.
  $(document).ready(function(){

    var pubKey = localStorage.getItem("pubKey");
    var privKey = localStorage.getItem("privKey");
    if(pubKey==null || privKey ==null){
    	
		  var generateKeys = function () {
	      var keySize = parseInt(1024);
	      var crypt = new JSEncrypt({default_key_size: keySize});
	      crypt.getKey();
	      console.log("New keys generated");
	      var private_key=crypt.getPrivateKey();
	      var public_key=crypt.getPublicKey();
	      console.log(private_key);
	      console.log(public_key);
	      localStorage.setItem("pubKey",public_key);
	      localStorage.setItem("privKey",private_key);
	      $("#block-bartik-content .content").append("<br><b><font color='#55ba1b'>Keys generated and stored</font></b><br><a href='store'>Encrypt some data!</a>");
	    };

	    generateKeys();
    }else{
	      console.log("Keys already exist");
	      $("#block-bartik-content .content").append("<br><b><font color='#f46841'>Keys already generated </font></b><br><a href='store'>Encrypt some data!</a>");
	      console.log(privKey);
	      console.log(pubKey);
    }
  });
})(jQuery); 

