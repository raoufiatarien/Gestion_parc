<?php
function encrypt($data){
	$key = 'df4D7qX5h';
	$key = substr(hash('sha256', $key, true), 0, 32);
	$method = 'aes-256-cbc';
	$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
	 return base64_encode(openssl_encrypt($data, $method, $key, OPENSSL_RAW_DATA, $iv));
}
function decrypt($data){
	$key = 'df4D7qX5h';
	$key = substr(hash('sha256', $key, true), 0, 32);
	$method = 'aes-256-cbc';
	$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
	return openssl_decrypt(base64_decode($data), $method, $key, OPENSSL_RAW_DATA, $iv);
}
?>