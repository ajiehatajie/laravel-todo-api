<?php

namespace App\Http\Controllers\API\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Follow;
use App\Http\Resources\CustomerResource;


class CustomerController extends Controller
{
    public function index()
    {
        return CustomerResource::collection(Customer::all());

    }

    public function store(Request $request)
    {
        $data = Customer::create([
                'name'=>$request['name'],
                'address' => $request['address'],
                'phone' => $request['phone'],
                'vehicle' => $request['vehicle'],
                'buy' => $request['buy']
                ]);

        return new CustomerResource($data);
    }

    public function show($id)
    {
        return new CustomerResource(Customer::findOrFail($id));
    }
    public function update(Request $request, $id)
    {
        $data = Customer::findOrFail($id);
        $data->name = $request['name'];
        $data->address = $request['address'];
        $data->phone = $request['phone'];
        $data->vehicle = $request['vehicle'];
        $data->buy = $request['buy'];
        
        $data->update();
        

        return new CustomerResource($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Customer::findOrfail($id);
 
        if($task->delete()) {
            return new CustomerResource($task);
        } 
    }

    public function followUp(Request $request,$id)
    {
        $follow = Follow::create([
            'costumer_id'=>$request['costumer_id'],
            'follow_up'=>$request['follow_up'],
            'date_follow'=>$request['date_follow'],
            'result'=>$request['result'],
            
            
        ]);

         return response()->json($follow, 200);
    }

    public function FollowDetail($id)
    {
       // $data = Follow::find(1)->costumer()->get();
        $data = Customer::find(1)->follow()->get();
        

        dd($data);
    }


}
