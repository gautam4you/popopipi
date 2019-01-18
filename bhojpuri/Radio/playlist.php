<?php
if(isset($_GET['id'])){
  $product_id = $_GET['id'];
  $fatchUrl1 ="https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=50&playlistId=";
  $fatchUrl2 ="&key=AIzaSyCg3WitBUQl5ifC2QygQaZUPOSRMKfSD5E";
  $fatch =$fatchUrl1.''.$product_id.''.$fatchUrl2;
  $xml = file_get_contents($fatch);
  echo $xml;
} else {
  echo "failed";
}
?>