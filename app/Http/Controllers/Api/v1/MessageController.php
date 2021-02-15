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
        $response = $request->response;

        if($type == "confirmation") {
            $confirmation = \DB::insert('INSERT INTO message_response (reference, confirmation) values (?, ?)', [$reference, $type]);
        } elseif ($type == "response") {
            $callback = \DB::table('message_response')->where('reference', "$reference")
                ->update(['response' => "$response"]);

            if ($callback == 1) {
                return "Actualizado correctamente";
            } else {
                return "Error al modificar los cambios";
            }
        }

    }

}
