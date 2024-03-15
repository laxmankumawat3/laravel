<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function index(){
        $buttonText = "register";
        $url = url('/addcustomer');
        $data = compact('buttonText','url');
        return view("customer")->with($data);
    }
    // move to trash
 
    public function softdelete($id){
    $customer =   Customer::find($id);
    if(!is_null($customer)){
      $customer->delete();
    }
    return redirect()->back();
    }
    // hard delete
    public function delete($id){
        $customer = Customer::onlyTrashed()->find($id);
        if(!is_null($customer)){
          $customer->forceDelete();
        }
        return redirect()->back();
        }
    public function restore($id){
        $customer = Customer::onlyTrashed()->find($id);
        if(!is_null($customer)){
          $customer->restore();
        }
        return redirect('/customer/view');
        }
    public function nav(){
        return view("navbar");
    }
    public function store(Request $request){
        $request->validate([
            "name"=> "required",
        ]);
        echo "<pre>";
        print_r($request->all());
        // create a object instance 
        //  this is insert query in laravel
        $costomer = new Customer();
        $costomer->name = $request['name'];
        $costomer->email = $request['email'];
        $costomer->point = $request['point'];
        $costomer->password = $request['password'];
        $costomer->gender = $request['gender'];
        $costomer->save();
        return redirect('/customer/view');

    }
// data fetch query in laravel
    public function view(Request $request){
        $search = $request['search']  ?? "";
        
        if($search !== ""){
            // where query chalani hai
            $customer = Customer::where("name","LIKE","%$search%")->orWhere("email","LIKE","%$search%")->get();
        }else{
            // $customer = Customer::all();
            //  paginatione
            $customer = Customer::paginate(10);
        }
      
        $data = compact('customer','search');
        return view ('customer-view')->with($data);
    }
    public function trash(){
        $customer = Customer::onlyTrashed()->get();
        $data = compact('customer');
        return view("customer-softdelete")->with($data);
    }
    

    public function edit($id){
        $customer = Customer::find($id);
        if(is_null($customer)){
            // user not fount
            return redirect('/customer/view');
        }else{
            $buttonText = "update";
            $url = url('/customer/edit').'/'.$id;
            $data = compact('customer', 'url','buttonText');
            return view ('customer')->with($data);
        }
    }
    public function update($id, Request $request){
        $costomer = Customer::find($id);
        $costomer->name = $request['name'];
        $costomer->email = $request['email'];
        $costomer->point = $request['point'];
        $costomer->password = $request['password'];
        $costomer->gender = $request['gender'];
        $costomer->save();
        return redirect('/customer/view');
    }
}
