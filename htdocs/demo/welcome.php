<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>
<?php
/**
 * PHP发送Json对象数据
 *
 * @param $url 请求url
 * @param $jsonStr 发送的json字符串
 * @return array
 */
function http_post_json($url, $jsonStr) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen($jsonStr)
        )
    );
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

//    return array($httpCode, $response);
    return $response;
}
echo "666";
$url = "https://iapdev.tstore.co.kr/digitalsignconfirm.iap";
$jsonStr = json_encode(array('a' => 1, 'b' => 2, 'c' => 2));
echo http_post_json($url, $jsonStr);
?>
Your email address is: <?php echo $_POST["email"]; ?>
</body>
</html>