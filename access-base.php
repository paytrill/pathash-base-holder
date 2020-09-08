<?php
if (isset($_POST['baselog'])) 
{
	$paytril_base_email = trim($_POST['email']);
	$paytril_base_password = htmlspecialchars($_POST['password']);
	
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
	CURLOPT_URL => "https://paytrill.com/api/base_api/accessing_api.php?paytril_base_email=$paytril_base_email&paytril_base_password=$paytril_base_password",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
}
elseif(!isset($_POST['baselog'])) 
{
?>
<form action="" method="POST" enctype="multipart/form-data">
<p style="color:black;">Email<br /><input type="email" name="email" Placeholder="" style="width:300px; height:50px; border-radius:15px 15px 15px 15px;" /></p>
<p style="color:black;">Password<br /><input type="text" name="password" style="width:300px; height:50px; border-radius:15px 15px 15px 15px;" /></p>
<p style="color:black;"><input type="submit" value="Access My Base" name="baselog" style="width:300px;" /></p>
</form>
<?php
}
?>
