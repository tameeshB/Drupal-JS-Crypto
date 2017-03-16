// Jquery wrapper for drupal to avoid conflicts between libraries.
(function ($) {
  // Jquery onload function.
  $(document).ready(function(){
    // localStorage.clear();
    localStorage.removeItem('privKey');
    localStorage.removeItem('pubKey');
  });
})(jQuery); 

