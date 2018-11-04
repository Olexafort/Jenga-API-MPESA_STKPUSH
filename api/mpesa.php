<?php

class Mpesa
{
	function __construct()
	{

	}

	public function security($var)
	{
		htmlspecialchars($var);
		return $var;
	}

	public function pay($phone, $paybill, $amount)
	{
		$token      = "MU7mlGqSzQr6I3AbiG9H7rsHdKHX";
		$curl        = curl_init();

		$details = '{
   				"customer": {
      				"mobileNumber": "'.$phone.'",
      				"countryCode": "KE"
   							},
   				"transaction": {
      				"amount": "'.$amount.'",
      				"description": "test STKPUSH",
      				"businessNumber": "'.$paybill.'",
      				"reference": "ref"
   				}
			}';

		curl_setopt_array($curl, array(
    		CURLOPT_URL => "https://uat.jengahq.io/transaction/v2/payment/mpesastkpush",
    		CURLOPT_RETURNTRANSFER => true,
    		CURLOPT_ENCODING => "",
    		CURLOPT_MAXREDIRS => 10,
    		CURLOPT_TIMEOUT => 30,
    		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    		CURLOPT_CUSTOMREQUEST => "POST",
    		CURLOPT_POSTFIELDS => $details,
    		CURLOPT_HTTPHEADER => array(
        		"Authorization: Bearer " . $token,
        		"cache-control: no-cache",
        		"Content-Type: application/json"
    		)
		));

		$result = curl_exec($curl);
		$err    = curl_error($curl);

		curl_close($curl);

		if ($err) {
    		echo "cURL Error #:" . $err;
		} else {
			echo $result;
		}

	}
}

$pay = new Mpesa();


?>