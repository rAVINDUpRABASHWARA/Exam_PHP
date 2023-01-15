<?php

function encrypt_decrypt($action, $string) {
        $output = false;
    
        $encrypt_method = "AES-256-CBC";
        $secret_key = '0011001KEY0001';
        $secret_iv = 'K10021E45110Y';
    
        // hash
        $key = hash('sha256', $secret_key);
        
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
    
        if ( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if( $action == 'decrypt' ) {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
    
        return $output;
    }


    function strEncrypt($value){

        $encrypted_txt = encrypt_decrypt('encrypt', $value);

        // Display the encrypted string
        return $encrypted_txt;

}

function strDecrypt($value){

        $decrypted_txt = encrypt_decrypt('decrypt', $value);
  
        // Display the decrypted string
        return $decrypted_txt;

}

?>