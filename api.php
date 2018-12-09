<?php


require_once("configs.php");



try{
    $action=$_POST['action'];
    $password=$_POST['s'];
}
catch(Exception $e){
    die("error ocuured!");
}
date_default_timezone_set('Asia/Shanghai');

$d = new DateTime('2018-01-13T00:00:00.000000Z');
$nowDate = new DateTime();
$nowDate->setTime(0,0,0);
#print($nowDate->format('Y-m-d H:i:s'));

$diff =  $nowDate->getTimestamp() -  $d->getTimestamp()  ;

#print($password);
#print($diff);

if($password != $diff)
{
    die("error occured");
}


$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
$mysqli->set_charset("utf8");

switch($action){

    case "addNumber":

        addNumber();

        break;

    case "deleteNumber":
        deleteNumber();
        break;

    case "listNumbers":
        listNumbers();
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



function listNumbers(){

    global $mysqli;

    $pageNo=$_POST['pageNo'];
    $pageSize=$_POST['pageSize'];
    //print("listRegions");

    if($pageNo == 1)
   {
    $start = 0;
   }
    else{
    $start = ($pageNo-1) * $pageSize + 1;
   }

    if ( checkIsNullOrEmpry($pageNo,$pageSize)){
        die("arguments can not be null or empty!");
    }

    $sql = "SELECT * FROM sms limit $start,$pageSize";

    #print($sql);
    print(executeSql($mysqli,$sql,"query"));
    
}


function addNumber(){

    global $mysqli;

    //print("addNumber");
    $number=$_POST['number'];
    $url=$_POST['url'];
    $regionId=$_POST['regionId'];
     
    if ( checkIsNullOrEmpry($number,$url,$regionId)){
        die("arguments can not be null or empty!");
    }


    $regionId = mysqli_real_escape_string($mysqli,$regionId);
    $icon = mysqli_real_escape_string($mysqli,$icon);
    $url = mysqli_real_escape_string($mysqli,$url);

    $sql = "insert into sms (number,regionId,url) values ('$number',$regionId,'$url')";

    print($sql);
    print(executeSql($mysqli,$sql,"insert"));
        
}

function deleteNumber(){


    global $mysqli;
    $numberId=$_POST['numberId'];

    if ( checkIsNullOrEmpry($numberId)){
        die("arguments can not be null or empty!");
    }

    $numberId = mysqli_real_escape_string($mysqli,$numberId);
    $sql = "delete from sms where id = $numberId";

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


function checkIsNullOrEmpry(){

    $numargs = func_num_args();

    $arg_list = func_get_args();
    for ($i = 0; $i < $numargs; $i++) {


        $str =  $arg_list[$i];

        if (  !isset($str) || trim($str) === '' ) {
            return true;
        }

    }

    return false;



}


function executeSql($mysqli,$sql, $action){
    

    if($action ==  "query")
    {

    $ret =   mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
    $rows = array();
    while($r = mysqli_fetch_assoc($ret)) {
        $rows[] = $r;
    }
    $ret = json_encode($rows,JSON_UNESCAPED_UNICODE);

    $mysqli->close();

    return $ret;
   }
    else {


    #update or insert sqls
    $ret =   mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli));
    //$ret = json_encode($rows);

    $mysqli->close();

    return $ret;

    }

}







?>
