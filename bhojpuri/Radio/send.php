<?php
       define( 'API_ACCESS_KEY', 'AIzaSyCY1ngE7_5GknA-nLQOQFAWNS1ZH0Np5-8');

	//Getting the message 
	$message = $_POST['message'];
	
	//Getting the title
	$title = $_POST['title'];
	
	 
	//Getting the big image url
	$image_url = $_POST['image_url'];

        $video_id = $_POST['vid'];

	$data = array
		(
			'message' 		=> $message,
			'title'			=> $title,
			'subtitle'		=> 'This is a subtitle',
			'tickerText'	=> 'Ticker text here',
			'vibrate'		=> 1,
			'sound'			=> 1,
			'bigPictureUrl'	=> $image_url,
                        'VID'	=> $video_id,
			'largeIcon'		=> 'large_icon',
			'smallIcon'		=> 'small_icon'
		);

 function sendMessage($data){
	//FCM api URL
	$url = 'https://fcm.googleapis.com/fcm/send';

	$server_key = $_POST[''];
				
	$fields = array();
	$fields['data'] = $data;
        $fields['to'] = '/topics/OLD_BOLLYWOOD';
	
	//header with content_type api key
	$headers = array(
		'Content-Type:application/json',
	  'Authorization:key=' . API_ACCESS_KEY
	);
				
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
	$result = curl_exec($ch);
		
	//Decoding json from result 
	$result = json_decode($result);
	 
	//Getting value from success 
	$flag = $result->success;
		
	//if success is 1 means message is sent 
	if($flag == 1){
	//Redirecting back to our form with a request success 
	header('Location: index.php?success');
	}else{
	//Redirecting back to our form with a request failure 
	header('Location: index.php?failure');
	}

	curl_close($ch);
	return $result;
}

sendMessage($data);