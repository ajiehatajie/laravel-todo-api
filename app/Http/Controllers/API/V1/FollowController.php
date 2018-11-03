<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Follow;
class FollowController extends Controller
{
    

  
    public function show($userid)
    {
        //$data = Follow::find($userid)->get();

        $data = Follow::where('costumer_id',$userid)->get();
        
        return response()->json(['data'=>$data], 200);
        //dd($data);
    }
}
