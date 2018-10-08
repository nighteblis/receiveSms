<?php

   $dbhost = "localhost";
   $dbuser = "root";
   $dbpass = "root";
   $dbname = "sms";


$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);


   //Select Database
   $numberurl=substr(base64_decode($_GET['smsaddress']), 0, -3);

   // Retrieve data from Query String
   // Escape User Input to help prevent SQL Injection

   //$sex = mysql_real_escape_string($sex);
   //$wpm = mysql_real_escape_string($wpm);
?>




<html>

<head>

<?php require_once("headerinclude.php"); ?>
</head>


<body>


<div id="banner">


</div>

<div id="apparea">

<div class="appbutton" id="up" style="margin-right:20px;"> <img width="20px" src="https://www.clker.com/cliparts/f/0/t/Y/n/t/thumbs-up-icon-green-th.svg.hi.png" />好用 </div>
<div class="appbutton" id="down">  <img style="margin-bottom: -4px;" width="20px" src="https://static1.squarespace.com/static/51c863c8e4b06874981f97e5/t/554bb0d4e4b03b9398abf2d3/1431023862028/thumDwn.png" /> 
不好用 </div>


</div>

<div id = "body">

  <iframe   src = "<?php echo $numberurl ?>" >
   </iframe>


</div>


<?php require_once("footer.php"); ?>

</body>

</html>
