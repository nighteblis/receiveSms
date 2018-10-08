
<?php


$regionId=$_GET['region'];
$icon=$_GET['icon'];
$cName=$_GET['c'];



$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "sms";


$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);


 $regionId = mysqli_real_escape_string($mysqli,$regionId);
  $icon = mysqli_real_escape_string($mysqli,$icon);

 //  echo $regions[$i];
  // echo $regions[$i]['id'];



   //build query
   $query = "SELECT * FROM sms where regionId=" .$regionId . " order by up desc";

   //echo $query."\r\n";

   //Execute query
   $qry_result = mysqli_query($mysqli,$query) or die(mysqli_error());

   //Build Result String

   // $display_string="<ul>";
   $display_string="";

   // Insert a new row in the table for each person returned
   while($row = mysqli_fetch_array($qry_result)) {
      $display_string .= "<div class=\"liInRegion\"><a href=\"number.do?smsaddress=".base64_encode($row[url]."sms")."\" target=\"_blank\">$row[number]</a></div>";
   }
   //echo "Query: " . $query . "<br />";

   //$display_string.= "</ul>";
   $display_string.= "";

// echo count($numbers);

?>

<html>

<head>

<?php require_once("headerinclude.php"); ?>

</head>
<body>



<div id = "body">

<div id="bodybanner">
全球免费收短信-免费手机短信注册-免费手机短信验证-免费收取短信验证码
</div>

<div id="banner">


<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 970*90 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:970px;height:90px"
     data-ad-client="ca-pub-8910738546638131"
     data-ad-slot="6703293567"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

</div>


<div class="regionnumber" >
<div class="flagContainerInRegion" ><img class="flag" src="pics/<?php echo $icon ?>"></img>
<br/>
<div style="text-align: center;"><?php echo $cName ?></div>
</div>
</div>

<div class="numbersInRegion">
<?php  echo $display_string ?>
<div style="clear:both;"></div>
</div>

<div class="rightads"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 300x600 文字 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-8910738546638131"
     data-ad-slot="7360832369"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>


<div style="clear:both;"></div>

</div>

<?php 

require_once("footer.php");


?>


<?php require_once("footer.php"); ?>


</body>

</html>
