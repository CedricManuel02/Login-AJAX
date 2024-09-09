<?php

class Helper
{
    public function sendStatusCode($status, $message)
    {
        $res = ["status" => $status, "message" => $message];
        echo json_encode($res);
        exit();
    }
}
