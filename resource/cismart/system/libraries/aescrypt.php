<?php
require_once( BASEPATH . 'plugins/aes-crypt/AESCryptFileLib.php' );
require_once( BASEPATH . 'plugins/aes-crypt/aes256/MCryptAES256Implementation.php' );


//Construct the implementation
$mcrypt = new MCryptAES256Implementation();

//Use this to instantiate the encryption library class
$lib = new AESCryptFileLib($mcrypt);

//This example encrypts and decrypts the README.md file
$file_to_encrypt = "sample-debitur.xlsx";
$encrypted_file = "sample-debitur.ekop";
$decrypted_file = "sample-debitur.decrypt.xlsx";

//Ensure target file does not exist
@unlink($encrypted_file);
//Encrypt a file
$lib->encryptFile($file_to_encrypt, "1234", $encrypted_file);

//Ensure file does not exist
@unlink($decrypted_file);
//Decrypt using same password
$lib->decryptFile($encrypted_file, "1234", $decrypted_file);

?>