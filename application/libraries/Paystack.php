<?php defined('BASEPATH') OR die('No direct script access allowed');

class Paystack {

    private $reference;
    private $error;


    public function verify($ref) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/{$ref}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer sk_test_4f2447cfba78ebd1b42aa9e861d96ba1747d421c",
                "Cache-Control: no-cache",
            ),
            ));
    
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if($err){
                return $err;
            }else{
                return $response;
            }
    }
}