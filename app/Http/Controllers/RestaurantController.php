<?php

namespace App\Http\Controllers;

use App\Model\restaurant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Session;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function list()
    {
      $data['restaurants']=restaurant::all();
      return view('Restaurant.list',$data);

    }
    public function add()
    {

      return view('Restaurant.add');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:restaurants|max:255',
            'address' => 'required',
            'image' => 'required',

        ]);
       $restaurant=new restaurant();
       $restaurant->name=$request->name;
       $restaurant->phone=$request->phone;
       $restaurant->email=$request->email;
       $restaurant->address=$request->address;
       if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $myImage=time().'.'.$extension;
            $file->move('upload/user_images/',$myImage);
            $restaurant->image=$myImage;
        }else{
            return $request;
            $restaurant->image='';
        }
       $restaurant->save();
       Session::flash('success','Student Created successfully');
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(restaurant $restaurant,$id)
    {
        $findId['restId']=restaurant::find($id);
        return view('Restaurant.edit',$findId);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, restaurant $restaurant,$id)
    {
        $update=restaurant::find($id);
        $update->name=$request->name;
        $update->phone=$request->phone;
        $update->email=$request->email;
        $update->address=$request->address;
        $update->image=$request->image;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $myImage=time().'.'.$extension;
            $file->move('upload/user_images/',$myImage);
            $update->image=$myImage;
        }
        $update->save();
        Session::flash('success','Data Updated successfully');
       return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(restaurant $restaurant,$id)
    {
        $deleteResto=restaurant::find($id);
        $deleteResto->delete();
        return redirect()->back();
    }
    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'required',

        ]);
        $register=new User();
        $register->name=$request->name;
        $register->phone=$request->phone;
        $register->email=$request->email;
        $register->password=encrypt($request->password);
        $register->save();
        Session::flash('success','User registration successfully');
        return redirect()->back();

    }

    public function login(Request $request){
        $user=User::where('email',$request->input('email'))->get();
        // if(bcrypt)
        if(Crypt::decrypt($user[0]->password)==($request->input('password')))
        {
            $request->session()->put('user',$user[0]->name);
        }


    }
}
