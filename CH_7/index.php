<?php
$logFile = fopen("visits.log", "a");
// or die("Unable to open file!");

$logEntry = "Visit from IP: ".$_SERVER["REMOTE_ADDR"]." ON ".date("Y-m-d:H:i:s")."\n";

fwrite($logFile, $logEntry);

fclose($logFile);

$loggFile = fopen("visits.log", "r");

while(!feof($loggFile)){
    echo fgets($loggFile)."<br>";
}
fclose($loggFile);

?>