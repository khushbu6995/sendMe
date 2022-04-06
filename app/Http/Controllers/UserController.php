<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserManagement;
use App\Http\Requests\UserRequest;
use App\Repository\UserRepository;
use Throwable;
use Illuminate\Support\Facades\Log;

class userController extends Controller
{
  public $user_repo;
  public $class;
  public function __construct(UserRepository $user_repo,UserManagement $class)
  {
    $this->user_repo = $user_repo;
    $this->class=$class;

  }
    /**
    *   return all Users 
    *   @author Khushbu Waghela
    */
    public function index()
    {
        try{
        return $this->user_repo->all_record();
        }catch(Throwable $e)
        {
            return Log::error($e->getMessage());
        }
    }

    /**
    *   @param $requrest 
    *   add new User
    *   @author Khushbu waghela
    */
    public function insertUser(UserRequest $request)
    {
        try{
        $insertFields=[
            'name'=>$request->name,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'gender'=>$request->gender,
        ];
        $result=$this->class->insertRecord($insertFields);
        return $result;
        }catch(Throwable $e)
        {
            return Log::error($e->getMessage());
        }
    }

    /**
    *   @param $requrest 
    *   update existing User
    *   @author Khushbu waghela
    */
    public function updateUser(Request $request)
    {   
        try{
        $update=[
            'id'=>$request->id,
            'name'=>$request->name,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'gender'=>$request->gender,
        ];
        $result=$this->class->updateRecord($update);
        return $result;
        }catch(Throwable $e)
        {
            return Log::error($e->getMessage());
        }
    }

    /**
    *   @param $requrest 
    *   delete existing User
    *   @author Khushbu waghela
    */
    public function deleteUser(Request $request)
    {
        try{
        $id=$request['id'];
        $result=$this->class->deleteRecord($id);
        return $result;
        }catch(Throwable $e)
        {
            return Log::error($e->getMessage());
        }
    }

    /**
    *   @param $requrest 
    *   send otp to mobile for login
    *   @author Khushbu waghela
    */
    public function logIn(Request $request)
    {
        try{
        $result=$this->class->logIn($request->phone);
        return $result;
        }catch(Throwable $e)
        {
            return Log::error($e->getMessage());
        }
    }

    /**
    * @param $otp
    * verify otp for login
    * @author Khushbu waghela
    */
    public function verifyOtp(Request $request)
    {
        try{
          $verify=[
            'phone'=>$request->phone,
            'otp'=>$request->otp,
          ];
        $result=$this->class->verifyOtp($verify);
        return $result;
        }catch(Throwable $e)
        {
            return Log::error($e->getMessage());
        }

    }

}
