import {closeIcon,clears}  from "./modules2.js";
$(document).ready(function() {
   
   $("#proceed").click(function() {
    window.location.href = "./php/logout.php";
   });

 
   closeIcon.on("click",clears);

});
