<?php

include_once 'Interworx/Interworx.php';

$ip = '192.168.1.1';
$key = '-----BEGIN INTERWORX API KEY-----
your interworx certificate
-----END INTERWORX API KEY-----';

//Must be filled in if working with a specific account.
$domain = '';

$iw = new Interworx\Interworx($ip, $key, $domain);

//Example for listing packages.
if(!$result = $iw->Nodeworx()->Packages()->list();) {
    echo 'NO PACKAGES';
    var_dump($iw->error);
    die;
} else {
	var_dump($result);
	echo '<pre>'; 
	var_export($result, true); 
	echo '</pre>';
	die;
}

//Example for creating a new hosting account.
$result = $iw->Nodeworx()->Siteworx()->add('newdomain.com','yor@email.com','password','package_name');
if($result) {
    var_dump($result);
}
else {
    echo 'ERROR:';
    var_dump($iw->error);
}
