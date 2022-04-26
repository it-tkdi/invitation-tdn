
<?php
$Name = Trim(stripslashes($_POST['name'])); 
$Email = Trim(stripslashes($_POST['email']));
$Phone = Trim(stripslashes($_POST['phone'])); 
$is_attend = Trim(stripslashes($_POST['is_attend']));
$Message = Trim(stripslashes($_POST['message']));

$postData = [
  "name" => $Name,
  "email" => $Email,
  "phone" => $Phone,
  "is_attend" => $is_attend,
  "message" => $Message
];

// var_dump($postData);die;

$encd = json_encode($postData);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => '54.255.218.5:3000/api/reservation/submit',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $encd,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
