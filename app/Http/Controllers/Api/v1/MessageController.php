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

        if($type == "confirmation"){
            $callback = \DB::table('message')->where('reference', "$reference")
                ->update(['status' => 1]);

            if ($callback == 1) {
                return "Actualizado correctamente";
            } else {
                return "Error al modificar los cambios";
            }
        }

        if($type == "response") {
            $callback = \DB::table('message')->where('reference', "$reference")
                ->update([
                    'response' => "$response",
                    'status' => 2
                ]);

            if ($callback == 1) {
                return "Actualizado correctamente";
            } else {
                return "Error al modificar los cambios";
            }
        }

    }

}
