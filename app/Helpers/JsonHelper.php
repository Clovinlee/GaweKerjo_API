<?php

function makeJson(int $status, string $message, $data){
    $json = [
        "code"=>$status,
        "message"=> $message,
        "data" => $data,
    ];

    return $json;
}

?>