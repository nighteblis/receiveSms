<?php


require_once("configs.php");



try{
$action=$_POST['action'];
$password=$_POST['s'];
}
catch(Exception $e){
    die("error ocuured!");
}

$d = new DateTime('2018-01-13T00:00:00.000000Z');
$nowDate = new DateTime();
print($nowDate);
$nowDate->setTime(0,0,0);

$diff = ( $nowDate->getTimestamp) - ( $d->getTimestamp()) ;

print($diff);




$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$mysqli->set_charset("utf8");

switch($action){

    case "addNumber":

        addNumber();

        break;

    case "deleteNumber":
        deleteNumber();
        break;

    case "addRegion":
        addRegion();
        break;

    case "deleteRegion":
        deleteRegion();
        break;        

    case "listRegions":
        listRegions();
        break;

    default:

        error();
        break;

} 



function addNumber(){

    global $mysqli;

 //   print("addNumber");
    $number=$_POST['number'];
    $url=$_POST['url'];
    $regionId=$_POST['regionId'];

    $regionId = mysqli_real_escape_string($mysqli,$regionId);
    $icon = mysqli_real_escape_string($mysqli,$icon);
    $url = mysqli_real_escape_string($mysqli,$url);

    $sql = "insert into sms (number,regionId,url) values ('"+$number+"','"+$regionId+"','"+$url+"')";

    print(executeSql($mysqli,$sql,"insert"));
        
}

function deleteNumber(){


    global $mysqli;
    $number=$_POST['number'];
   // print("deleteNumber");
    
    print(executeSql($mysqli,$sql,"delete"));
}

function addRegion(){
    global $mysqli;
    //print("addRegion");
    
    executeSql($mysqli,$sql,"");
}

function deleteRegion(){
    global $mysqli;
    //print("deleteRegion");
    
    executeSql($mysqli,$sql,"");
}

function listRegions(){

    global $mysqli;

    //print("listRegions");

    $sql = "SELECT * FROM region";

    print(executeSql($mysqli,$sql,"query"));
        
}


function error(){

    print("not supported");
}


function executeSql($mysqli,$sql, $action){
    

    if($action ==  "query")
    {

    $ret =   mysqli_query($mysqli,$sql) or die(mysqli_error());
    $rows = array();
    while($r = mysqli_fetch_assoc($ret)) {
        $rows[] = $r;
    }
    $ret = json_encode($rows,JSON_UNESCAPED_UNICODE);

    $mysqli->close();

    return $ret;
   }
    else {



    $ret =   mysqli_query($mysqli,$sql) or die(mysqli_error());
    //$ret = json_encode($rows);

    $mysqli->close();

    return $ret;

    }

}







?>
