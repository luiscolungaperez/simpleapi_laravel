<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        $type = $request->type;
        $reference = $request->reference;
        $number = $request->number;
        $message = $request->message;
        $response = $request->response;
        $sendDate = $request->send_date;
        $responseDate = $request->response_date;

        $callback = \DB::table('message')->where('reference', "$reference")
            ->update(['response' => "$response"]);

        // $callback = \DB::update("UPDATE message SET response = '?' WHERE reference = '?'", [$response, $reference]);

        // $arreglo = [
        //     "type"=> $type,
        //     "reference"=> $reference,
        //     "number"=> $number,
        //     "message"=> $message,
        //     "response"=> $response,
        //     "send_date"=> $sendDate,
        //     "response_date"=> $responseDate
        // ];

        return $callback;
    }

}
