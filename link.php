<?php
$uid = $_GET['uid'];
echo $uid;
$url = "https://api.betterdoctor.com/2016-03-01/doctors/$uid?user_key=d6fb865f0d167679bbe87e722ea09bdc";
echo $url;

$fp = fopen($url,"r");
$more = fread($fp,5000);
print $more;
 ?>
