<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "ict"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

$images = ['SMKN 5 Bandung.jpg'];

foreach($images as $image){
    $imagelink = file_get_contents($image); 
  
    // image string data into base64 
    $encdata = base64_encode($imagelink);
    
    // Output
    $sql = "INSERT INTO galeri(judul ,foto)
        VALUES('{$image}', '{$encdata}')";
    $current_id = mysqli_query($con, $sql);
}

//Read
$sql = "SELECT judul,foto FROM galeri" ;
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

mysqli_close($con);

$split_name = explode(".",$row['judul']);
$type = $split_name[1];

$tag = "<img src='data:image/".$type.";base64,".$row['foto']."'>";

echo $tag;


