<?php

class Helper
{
    public function sendStatusCode($status, $message)
    {
        http_response_code($status);
        $res = ["status" => $status, "message" => $message];
        echo json_encode($res);
        exit();
    }
}
