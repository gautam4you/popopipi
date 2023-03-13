<?php

print "testing";

function sendPushnotification($data = array()) {

  $apiKey = 'AAAAUb1BElo:APA91bFjzVaKJ5o6RxNV5JCRuoE89qPlFLS2KqO9KQUrGFgDnI0_bIKONOgQuoKO1DIUh_6zZPCxD3TXufFnCVCsP0d3uWuJ72gMrgF54dxOOFWfaUQjknZBkLfQNDoXntn15cOtteWX';

  $fields = array('to' => '/topics/ARTIST_RADIO_NEWS' , 'notification' => $data, 'data' => $data);
  $headers = array('Authorization: key=' .$apiKey, 'Content-Type: application/json', 'priority' => 10);

  $url = 'https://fcm.googleapis.com/fcm/send';

  // var_dump($fields);

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
  $result = curl_exec($ch);
  curl_close($ch);

  return json_encode($result, true);
}

$message = $_GET['message'];
$articletitle = $_GET['article_title'];
$imageurl = $_GET['image_url'];
$link = $_GET['link'];
$type = $_GET['type'];

if(empty($imageurl)){
 $imageurl = 'https://';   
}

$data = array(
   'message' => $message,
   'bigPictureUrl' => $imageurl,
   'Type' => $type,
   'web_url' => $link,
   'title' => $articletitle
);

var_dump(sendPushnotification($data));


?>