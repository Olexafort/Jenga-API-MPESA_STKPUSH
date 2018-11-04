<?php
$plainText  = "0011547896523KE2018-08-09";
$privateKey = openssl_pkey_get_private(("file://path/to/privatekey.pem"));
$token      = "QNg9X7cLJSpZVOpaJJ33wX0AbcRF";

openssl_sign($plainText, $signature, $privateKey, OPENSSL_ALGO_SHA256);


$curl        = curl_init();
$data_string = '{
    "countryCode":"KE",
    "accountId":"0011547896523",
    "date":"2018-08-09"
    }';

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://sandbox.jengahq.io/account-test/v2/accountbalance/query",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $data_string,
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer " . $token,
        "cache-control: no-cache",
        "Content-Type: application/json",
        "signature: " . base64_encode($signature)
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
?>