<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        // $user = User::select('email','name')->where('status',1)->get();
        // return response()->json($user);
        if (count($user)> 0) {
            $data = [
                "status" => 200,
                "message"=> "user fond",
                "data"=> $user
            ];
            return response()->json($data);
        }
        else{
           return response()->json(["status"=> 404,"message"=> "user not fount"]);
        }
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validation = Validator($request->all(), [
            "name"=> ["required"],
            "email"=> ['required','email','unique:users'],
            "password"=> ['required','min:8', 'confirmed'],
            "password_confirmation" => ["required"],
        ]);
        if ($validation->fails()) {
            return response()->json($validation->messages(), 400);
        }
        else{
            $data = [
                'name'=> $request->name,
                'email'=> $request->email,
                'password' => bcrypt($request->password),
                'contact' =>$request->contact,
            ];
        }
        DB::beginTransaction();
        try {
            User::create($data);
            DB::commit();
            $response = [
                'status'=> 'success',
                'message'=> 'user register successfully'
            ];
            return response()->json([$response],200);
        }catch(\Exception $e){
                  DB::rollBack();
                  print_r($e->getMessage());
        }
    //    echo "<pre>";
     print_r(request()->all());
    //    echo "</pre>";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(['status'=> 'error','message'=> 'user not found'],404);
        }
        else{
            return response()->json(['status'=> 'success','message'=> 'user found successfully', 'data'=>$user],200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // when test througth postman send data x-www-from- urlencoded , then you get data from request;

        print_r($request->all());
        // die();
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(['status'=> 'error','message'=> 'user not exist'] ,404);
        }else{
            DB::beginTransaction();
            try {
               $user->name = $request['name'];
               $user->email = $request['email'];
               $user->contact = $request['contact'];
               $user->save();
               DB::commit();
               return response()->json(['status'=> 'success','message'=> 'user update successfully'],200);
            } catch (\Throwable $th) {
                //throw $th;
                DB::rollBack();
                $user = null;
                if(is_null($user)){
                    return response()->json(['status'=> 'error','message'=> 'please insert all filed','err_message'=>$th->getMessage()],500);
                }
            }
            // this error occur when user not insert input fileds
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        // $product  = DB::table('products')->where('pid',$request->input('pid'))->get();
        if(is_null($user)){
            return response()->json(['status'=> 'error','message'=> 'user not found'],404);
        }else{
            DB::beginTransaction();
            try {
                $user->delete();
                // sometime our primary key is foreign key that generate an error so that you catch it what is happend;
                DB::commit();
               return response()->json(['status'=> 'success','message'=> 'user delete succesfully'],200);
            } catch (\Throwable $th) {
                //throw $th;
                DB::rollBack();
            }
            
        }
        //
    }

    // change password 
    // public function changePassword(Request $request, $id){
    //     print_r($request->old_password);

    //     $user = User::find($id);
    //     if(is_null($user)){
    //         return response()->json(['status'=> 'error','message'=> 'user not found',404]);
    //     }
    //     else{
    //         DB::beginTransaction();
    //         try {
    //           if($user->password != $request->old_password){
    //             $response = [
    //                 'status'=> '0',
    //                 'message'=> 'old password not match',
    //             ];
               
    //           }elseif($request->new_password != $request->confirmed_password){
    //             $response = [
    //                 'status'=> '0',
    //                 'message'=> 'new_password or confimed_password not match',
    //             ];
              
    //           }
    //           else{
    //               $user->password = $request->new_password;
    //               $user->save();
    //               DB::commit();
    //               $response = [
    //                 'status'=> '0',
    //                 'message'=> ' password update successfully match',
    //             ];
    //             }
    //         } catch (\Throwable $th) {
    //            DB::rollBack();
    //             $response = ['status'=> 'error','message'=> 'internal server error', 'err_message'=>$th->getMessage(),500];

    //         }
    //         return response()->json($response);
    //     }

    // }


public function changePassword(Request $request, $id)
{
    try {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
            'confirmed_password' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {
            $response = [
                'status' => '0',
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ];

            return response()->json($response, 400); // 400 Bad Request
        }

        $user = User::find($id);

        if (is_null($user)) {
            return response()->json(['status' => 'error', 'message' => 'User not found'], 404);
        }

        DB::beginTransaction();

        if ($user->password != $request->old_password) {
            $response = [
                'status' => '0',
                'message' => 'Old password does not match',
            ];
        } else {
            $user->password = $request->new_password;
            $user->save();
            DB::commit();
            $response = [
                'status' => '1',
                'message' => 'Password updated successfully',
            ];
        }
    } catch (\Throwable $th) {
        DB::rollBack();
        $response = [
            'status' => 'error',
            'message' => 'Internal server error',
            'err_message' => $th->getMessage(),
        ];
    }

    return response()->json($response);
}

}
