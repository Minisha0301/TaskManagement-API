<?php

namespace App\Http\Controllers;

abstract class Controller
{
     public function sendsuccess($data= null, $msg = '', $code) {
        return response()->json([
            'data' => $data,
            'message' => $msg,
            'success' => true
        ], $code);
    }

    public function senderror($error= null, $errmsg = '', $code) {
        return response()->json([
            'error' => $error,
            'message' => $errmsg,
            'success' => false
        ], $code);
    }
}
