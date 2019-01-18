<?php
if(isset($_GET['id'])){
  $product_id = $_GET['id'];
  $fatchUrl ="https://you-link.herokuapp.com/?url=https://www.youtube.com/watch?v=$product_id";
  $xml = file_get_contents($fatchUrl);
  echo $xml;
} else {
  echo "failed";
}
?>