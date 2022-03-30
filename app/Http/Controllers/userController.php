<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserManagement;
use App\Http\Requests\userRequest;
use Illuminate\Support\Facades\App;

class userController extends Controller
{
    /**
    *   return all Users 
    *   @author Khushbu Waghela
    */
    public function index()
    {
        return User::all();
    }

    /**
    *   @param $requrest 
    *   add new User
    *   @author Khushbu waghela
    */
    public function insertUser(Request $request)
    {
        $insertFields=[
            'name'=>$request->name,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'gender'=>$request->gender,
        ];
        $class = App::make(UserManagement::class);
        $result=$class->insertRecord($insertFields);
        return $result;
    }

    /**
    *   @param $requrest 
    *   update existing User
    *   @author Khushbu waghela
    */
    public function updateUser(Request $request)
    {
        $update=[
            'id'=>$request->id,
            'name'=>$request->name,
            'address'=>$request->address,
            'email'=>$request->email,
            'gender'=>$request->gender,
        ];
        // dd($update);
        $class = App::make(userManagement::class);
        $result=$class->updateRecord($update);
        return $result;
    }

    /**
    *   @param $requrest 
    *   delete existing User
    *   @author Khushbu waghela
    */
    public function deleteUser($id)
    {
        $class = App::make(userManagement::class);
        $result=$class->updateRecord($id);
        return $result;
    }

    /**
    *   @param $requrest 
    *   send otp to mobile for login
    *   @author Khushbu waghela
    */
    public function logIn(Request $request)
    {
        $class = App::make(userManagement::class);
        $result=$class->logIn($request->phone);
        return $result;

    }

    /**
    * @param $otp
    * verify otp for login
    * @author Khushbu waghela
    */
    public function verifyOtp(Request $request)
    {
          $verify=[
            'phone'=>$request->phone,
            'otp'=>$request->otp,
          ];
         $class = App::make(userManagement::class);
         $result=$class->verifyOtp($verify);
         return $result;

    }

}
