<?php
/**
 * Created by PhpStorm.
 * User: wangjia
 * Date: 2016/12/27
 * Time: 下午9:15
 */

function parse_signed_request($signed_request)
{
    header("Content-type: text/html; charset=utf-8");
    list($encoded_sig, $payload) = explode('.', $signed_request, 2);
    echo "encode sig  -> " . $encoded_sig . "\n";
    echo "paylod -> " . $payload . "\n";
    $secret = "4cee6a6cb4272b3288a41cb8cf588354"; // Use your app secret here
    $sig = base64_url_decode("cpO8Ad5SFeaJWnth90E7eAtPj3DDHQkgIDoVSNSrXgY");//$encoded_sig);
    echo "sig ->  ".$sig." \n";
    printByte($sig);
    $encode_payload = base64_url_decode($payload);
    printByte($encode_payload);
    echo $encoded_sig . "\n";
    $data = json_decode($encode_payload, true);
    $expected_sig = hash_hmac('sha256', $payload, $secret, $raw = true);
    echo $expected_sig. "\n";
    if ($sig !== $expected_sig) {
        error_log('Bad Signed JSON signature!');
        return null;
    } else {
        error_log('pass');
    }

    return $data;
}

function base64_url_decode($input)
{
    $afterRe = strtr($input, '-_', '+/');
    echo "after ->" . $afterRe . "\n";
    $date = base64_decode($afterRe);
    return $date;
}

function getBytes($string)
{
    $bytes = array();
    for ($i = 0; $i < strlen($string); $i++) {
        $bytes[] = ord($string[$i]);
    }
    foreach ($bytes as $baa) {
        echo $baa . ",";
    }
    return $bytes;
}

function printByte($string)
{
    $a = unpack('C*', $string);
    $result = '';
    foreach ($a as $item) {
        $result = $result . "," . $item;
    }
    echo $string . " ->";
    echo $result . "\n";
}

//parse_signed_request("p-EfVf8l-PFzIl6kLjBo8zuFEDlu2KsKg9n15vmpMW8.eyJhbGdvcml0aG0iOiJITUFDLVNIQTI1NiIsImFtb3VudCI6IjQ5Ljk5IiwiY3VycmVuY3kiOiJVU0QiLCJpc3N1ZWRfYXQiOjE0ODMwMTI2OTQsInBheW1lbnRfaWQiOjkyODQ4MzkzMzk0ODc2OCwicXVhbnRpdHkiOiIxIiwicmVxdWVzdF9pZCI6IjgxNDQ0MDM3MDgyNDk0MTU2OCIsInN0YXR1cyI6ImNvbXBsZXRlZCJ9")
parse_signed_request("CyyvlXgX8aZhFhlg0LLGUSUgC1IVbV_y6bGZHZ7AiOQ.eyJhbGdvcml0aG0iOiJITUFDLVNIQTI1NiIsImFtb3VudCI6IjQ5Ljk5IiwiY3VycmVuY3kiOiJVU0QiLCJpc3N1ZWRfYXQiOjE0ODM1MjY2OTksInBheW1lbnRfaWQiOjkyNTg3NjA4NzU0Mjg4NywicXVhbnRpdHkiOiIxIiwicmVxdWVzdF9pZCI6IjgxNjU5NjI2ODU4MjMwOTg4OCIsInN0YXR1cyI6ImNvbXBsZXRlZCJ9")
?>