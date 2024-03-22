import {closeIcon,clears}  from "./modules2.js";
$(document).ready(function() {
   
   $("#proceed").click(function() {
    window.location.href = "./php/logout.php";
   });
   // var originalDate,formattedDate;
 
   closeIcon.on("click",clears);

});
