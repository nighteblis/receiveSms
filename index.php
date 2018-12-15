<?php

require_once("configs.php");


$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

$mysqli->set_charset("utf8");


if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

   //Connect to MySQL Server
   //Select Database
  

   // Retrieve data from Query String
   // Escape User Input to help prevent SQL Injection

   //$age = mysqli_real_escape_string($age);
   //$sex = mysqli_real_escape_string($sex);
   //$wpm = mysqli_real_escape_string($wpm);

   $query = "SELECT * FROM region";

   $qry_result = mysqli_query($mysqli,$query) or die(mysqli_error());
  $regions=array();

  while (  $row = mysqli_fetch_array($qry_result)) {
    array_push($regions,$row);
     // $regions[$row['id']]=$row;
  }

  $numbers=array();

//echo json_encode($regions);
//echo count($regions);

  for( $i = 0 ; $i < count($regions) ; $i++){

  // echo $regions[$i];
  // echo $regions[$i]['id'];



   //build query
   $query = "SELECT * FROM sms where regionId=" .strval($regions[$i]['id']) . " order by up desc limit 2";

   //echo $query."\r\n";

   //Execute query
   $qry_result = mysqli_query($mysqli,$query) or die(mysqli_error());

   //Build Result String

   $display_string="<ul class='numberlist'>";

   
   // Insert a new row in the table for each person returned
   while($row = mysqli_fetch_array($qry_result)) {
      $display_string .= "<li><a href=\"number.php?smsaddress=".base64_encode($row[url]."sms")."\" target=\"_blank\"><img class=\"smsicon\" src=\"http://icons.iconarchive.com/icons/custom-icon-design/pretty-office-12/512/SMS-Message-icon.png\"/>$row[number]</a></li>";
      
    }

   $display_string .= "<li><a href=\"region.php?icon=".$regions[$i]['icon']."&c=".$regions[$i]['regionName']."&region=".(string)$regions[$i]['regionId']."\">更多...</a></li>";


   //echo "Query: " . $query . "<br />";

   $display_string.= "</ul>";


   array_push($numbers,$display_string);

   //echo $display_string;

}


// echo count($numbers);

?>




<html>



<head>

<?php require_once("headerinclude.php"); ?>

</head>


<body>


<div id="bodybanner">
<img class="headericon" src="http://icons.iconarchive.com/icons/custom-icon-design/pretty-office-12/512/SMS-Message-icon.png"> 全球免费收短信-免费手机短信注册-免费手机短信验证-免费收取短信验证码
</div>

<div id = "body">




<div id="headerbanner">

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

<?php  for($i = 0 ; $i < count($regions) ; $i ++) {?>

<div class="regionnumber" >
<div class="flagContainer" ><a title="<?php echo $regions[$i]['regionName']?>" href="region.php?icon=<?php echo $regions[$i]['icon']  ?>&c=<?php echo $regions[$i]['regionName'] ?>&region=<?php  echo $regions[$i]['regionId']  ?>" > <img class="flag" src="pics/<?php echo $regions[$i]['icon'] ?>"></img></a></div>
<?php  echo $numbers[$i] ?>
</div>

<?php } ?>

<div class="regionnumber" id="us">
<div class="flagContainer" ><img class="flag" src="pics/more.jpg"></img></div>
<ul><li>更多加入中...</li></ul>
</div>



</div>


<?php require_once("footer.php"); ?>


</body>








</html>
