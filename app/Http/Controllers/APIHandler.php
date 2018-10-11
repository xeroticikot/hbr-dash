<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IncomingData;
use App\DataStatus;
use App\Boats;

class APIHandler extends Controller
{
    public function getReadyBookingsData(Request $request){
        $sn_no = IncomingData::all()->last();
        $sn = 0;
        if(isset($sn_no)){
            $sn = $sn_no->sn_no;
        }
        $sn = $sn + 1;
        if($request->isMethod('post')){
            foreach($request->all() as $k => $v){
                if(is_array($v)){
                    foreach($v as $i){
                        $data = new IncomingData();
                        $data->key = $k;
                        $data->value = $i;
                        $data->sn_no = $sn;
                        $data->save();
                    }
                }else{
                    $data = new IncomingData();
                    $data->key = $k;
                    $data->value = $v;
                    $data->sn_no = $sn;
                    $data->save();
                }
            }
            $status = new IncomingData();
            $status->sn_no = $sn;
            $status->key = 'status';
            $status->value = 'Requested';
            $status->save();
            return response()->json([
                'status' => 'true',
                'message' => 'The data was saved!'
            ], 200);
        }
    }

}
