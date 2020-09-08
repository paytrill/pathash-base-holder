<?php
if(isset($_POST['submit'])) 
{
	$paytril_coin_AUTH = trim($_POST['paytril_coin_AUTH']);
	$paytril_user_holder = trim($_POST['paytril_user_holder']);
	$paytril_recipient_holder = trim($_POST['paytril_recipient_holder']);
	$coin_name = trim($_POST['coin_name']);
	$pat_sending_amount = trim($_POST['pat_sending_amount']);
	$curr = trim($_POST['curr']);
	$transaction_token = trim($_POST['transaction_token']);
	
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
	CURLOPT_URL => "https://paytrill.com/api/base_api/mine_withdrawal_api.php?paytril_coin_AUTH=$paytril_coin_AUTH&paytril_user_holder=$paytril_user_holder&paytril_user_wallet=$paytril_user_wallet&paytril_recipient_holder=$paytril_recipient_holder&coin_name=$coin_name&pat_sending_amount=$pat_sending_amount&currency=$curr&transaction_token=$transaction_token",
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
  
  echo '<br />';
  echo '<a href="">Continue</a>';
}
?>
<?php
if(!isset($_POST['submit']))
{
?>
  <form action="" method="POST" enctype="multipart/form-data">
          <label for="query">Withdraw mined funds:</label><br />
          <input type="hidden" name="paytril_coin_AUTH" value="Hash key of exchanger having base/block on PATHASH" />
		  <input type="text" style="width:300px; height:40px;" name="paytril_user_holder" placeholder="Your base/block Email Address" /><br />
		  <input type="text" style="width:300px; height:40px;" name="paytril_recipient_holder" placeholder="Recipient Wallet Address" /><br />
		  <select style="width:300px; height:40px;" name="coin_name">
		      <option value="paytrill">Paytrill</option>
		  </select><br />
		  <input type="text" style="width:300px; height:40px;" name="pat_sending_amount" placeholder="Amount to Send in Currency Chosen" /><br />
		  <select style="width:300px; height:40px;" name="curr">
		      <!--<option value="USD">USD</option>-->
		      <option value="PAT">PAT</option>
		  </select><br />
		  <input type="text" style="width:300px; height:40px;" name="transaction_token" placeholder="Enter your Base/Block password" /><br />
          <input type="submit" name="submit" value="Withdraw Fund" style="width:300px; height:40px; color:white; background-color:brown; border-color:brown; font-weight:bolder;" />
  </form>
<?php
}
?>
