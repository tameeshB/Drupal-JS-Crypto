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
    $("#edit-show").click(function(event){
    	event.preventDefault();
    	alert("Yes!");
    });
  });
})(jQuery); 

