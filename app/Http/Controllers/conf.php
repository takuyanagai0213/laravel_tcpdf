<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class conf extends Controller
{
    public function getConference()
    {
        $room_info = array(
            '9' => array(
                array(
                    'ROOM_NAME' => '会議室1',
                    'NUM' => '3'
                ),
                array(
                    'ROOM_NAME' => '会議室2',
                    'NUM' => '0'
                ),
                array(
                    'ROOM_NAME' => '会議室3',
                    'NUM' => '3'
                ),
            ),
            '10' => array(
                array(
                    'ROOM_NAME' => '会議室1',
                    'NUM' => '3'
                ),
                array(
                    'ROOM_NAME' => '会議室2',
                    'NUM' => '0'
                ),
                array(
                    'ROOM_NAME' => '会議室3',
                    'NUM' => '3'
                ),

            ),
            '11' => array(
                array(
                    'ROOM_NAME' => '会議室1',
                    'NUM' => '3'
                ),
                array(
                    'ROOM_NAME' => '会議室2',
                    'NUM' => '0'
                ),
                array(
                    'ROOM_NAME' => '会議室3',
                    'NUM' => '3'
                ),

            ),
        );
        return response()->json($room_info);
    }

}
