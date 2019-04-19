<?php

function token(){
    $key = 'loremipsum';
    
    $header = [
        'typ' => 'JWT',
        'alg' => 'HS256'
        ];
    
    $header = json_encode($header);
    $header = base64_encode($header);
    
    
    $payload = [
        'iss' => 'site.com.br',
        'username' => 'name_user',
        'email' => 'usuario@email.com'
        ];
    
    $payload = json_encode($payload);
    $payload = base64_encode($payload);
    
    
    $secret = hash_hmac('sha256',"$header.$payload",$key,true);
    $secret = base64_encode($secret);
    
    $token  = "$header.$payload.$secret";
    
    return $token;
}

//https://jwt.io
$received_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJzaXRlLmNvbS5iciIsInVzZXJuYW1lIjoibmFtZV91c2VyIiwiZW1haWwiOiJ1c3VhcmlvQGVtYWlsLmNvbSJ9.5HwuWSsq+2MBjsazZeVd5J+APH5Tq63bApXwTYOeCTU=';

if($received_token === token()){
    echo "Continue";
}else{
    echo "Stop";
}

