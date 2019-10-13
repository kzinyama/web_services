<?php
session_start();
ini_set("allow_url_fopen", 1);
//--------------------------------------------------------------
//start configurations
//In order to recieve sales data. Create an alias (redirect) in the web root folder of apache (httpd.config)
//Paths and names should have no spaces in url and file names
//All requests for /services/rest/salesSummary will be redirected to restfulSalesSummary.php
/*
Alias /services/rest/salesSummary /wamp/www/webservice/salessummary/restful/services/rest
<Directory /wamp/www/webservice/salessummary/restful/services/rest>
  Options none
  AllowOverride all
  DirectoryIndex restfulSalesSummary.php
  Require all granted
</Directory>
*/
//end configurations

//http://webmasters.stackexchange.com/questions/78290/where-how-to-put-htaccess-files
//https://www.addedbytes.com/articles/for-beginners/url-rewriting-for-beginners/
//http://stackoverflow.com/questions/29308898/how-do-i-extract-data-from-json-with-php

//1. additional mapping to apache php.ini
//enable -> mod_rewrite
//2. Change the below in httpd.conf
//<Directory />
//   Options Indexes FollowSymLinks MultiViews
//   AllowOverride All
//   Order allow,deny
//   allow from all
#    Require all denied
//</Directory>

//3. To accomplish this, we need to first create a text document called ".htaccess" to contain our rules and place it in the root directory (www) and configure the destination address (.htaccess)
//RewriteEngine On    # Turn on the rewriting engine

//RewriteEngine On    # Turn on the rewriting engine

//RewriteRule ^services/rest/salesSummary/? /webservice/salessummary/restful/services/rest/restfulSalesSummary.php?barcode=$1 [QSA]    # Handle requests for "/services/rest/salesSummary" ([a-zA-Z0-9\-]+)
//--------------------------------------------------------------

//$key=$_SERVER['QUERY_STRING'];

//$key = $_GET["floorSummary"] . $_GET["platformCode"];



//first read and parse json data that has been received
$json_params = file_get_contents("php://input", false);


//$myfile = fopen("newfile3.txt", "w") or die("Unable to open file!");
//fwrite($myfile, "sdf" . $json_params . $_GET["growerNumberFromStudent"] . $_REQUEST['growerNumberFromStudent'] . $_GET["floorSummary"] . $_REQUEST['growerNumberFromStudent']);		
//fclose($myfile);

$requestInput = $_GET["growerNumbers"] . $_REQUEST['growerNumbers'];
echo "Your request input was ".$requestInput."<br/><br/>";

//valid if valid JSON has been received from client. Remember JSON is just string so you need to decode the JSON data in order to see the array SalesSummary

// get the HTTP payload, and decode json data received
function isValidJSON($str) {
   json_decode($str, true);
   return json_last_error() == JSON_ERROR_NONE;
}


//if (strlen($json_params) > 0 && isValidJSON($json_params))
  //$FloorSummary = json_decode($json_params, true);
  
//if explode this to get the array of bale data  $_GET["floorSummary"]


$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
fwrite($myfile, $json_params );		
fclose($myfile);


//iterate through payload - Sales Summary Data that is in the json array in the loop save data to DATABASE
$myfile = fopen("newfile2.txt", "w") or die("Unable to open file!");
/*
for ($i = 0; $i < count($FloorSummary); $i++) {
	fwrite($myfile, $FloorSummary[$i]['barcodeNo'] );		
	fwrite($myfile, $FloorSummary[$i]['iLotNumber'] );		
	fwrite($myfile, $FloorSummary[$i]['iGrowerID'] );		
	fwrite($myfile, $FloorSummary[$i]['dOriginalWeight'] );		
	fwrite($myfile, $FloorSummary[$i]['createdBy'] );		
	fwrite($myfile, $FloorSummary[$i]['createdOn'] );		
	fwrite($myfile, $FloorSummary[$i]['receivedDate'] );		
	fwrite($myfile, $FloorSummary[$i]['rowNo'] );		
	fwrite($myfile, $FloorSummary[$i]['saleNo'] );		
	//insert code to save to database here based on baleStatus
}
*/
fclose($myfile);

//echo a response to the client
//echo $serverResponse;
?>

Congratulations!!! You have successfully connected to my WebService. Its at this point that I would proceed to JSON encode the data I want to pass to you. From there you would decode the JSON data and proceed to manipulate it in your application.

Let me know this message once you have connected.