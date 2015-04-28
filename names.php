<?php
require_once 'dbconnection.php';

$query = "SELECT userName FROM customers";

$result = mysql_query($query);
if (!$result) die("failed".mysql_error());

while ($row = mysql_fetch_row($result)) 
{ 
   $a[] = $row[0]; 
}

$q = $_REQUEST["q"];

$hint = "";

if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

echo $hint === "" ? "no suggestion" : $hint;
?>