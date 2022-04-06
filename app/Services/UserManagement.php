<?php

namespace App\Services;

use App\Repository\UserRepository ;
use Throwable;
use Illuminate\Support\Facades\Log;
use Nexmo\Laravel\Facade\Nexmo;

class UserManagement
{   
    public function __construct(UserRepository $user_repo)
    {
        $this->user_repo = $user_repo;
    }

    /**
    * @param $insertFields[]
    * call add method of user repository to add record
    * @author Khushbu Waghela
    */
    public function insertRecord($insertFields)
    {
        // dd($insertFields);
        try {
            $user=$this->user_repo->store($insertFields);
            // dd($user);
            if($user){
                 return ['success'=>'User Inserted'];
            }else{
                return ['error'=>'something went wrong'];
            }
        } catch (Throwable $e) {
        Log::error($e->getMessage());
        // return view('error.error');
        return $e;
        }
    }

    /**
    *   @param $update[]
    *   call update method of user repository to update record
    *   @author Khushbu Waghela 
    */
    public function updateRecord($update)
    {
        try {
           $user=$this->user_repo->update($update);
           if($user)
           {
               return ['result'=>'record updated'];
           }
           else{
               return ['result'=>'something went wrong'];
           }
        } catch (Throwable $e) {
            return  Log::error($e->getMessage());
        }
    }

    /**
    *   @param $id
    *   call delete method of user repository to delete record
    *   @author Khushbu Waghela 
    */
    public function deleteRecord($id)
    {
        // dd($update);
        try {
           $user=$this->user_repo->delete($id);
           if($user)
           {
               return ['result'=>'record Deleted'];
           }
           else{
               return ['result'=>'something went wrong'];
           }
        } catch (Throwable $e) {
            return  Log::error($e->getMessage());
        }
    }

    /**
    *   @param $phone
    *   validate the number
    *   send Otp to the phone number
    *   @author Khushbu Waghela 
    */
    public function logIn($phone)
    {
        try {
            $validPhone=$this->user_repo->phone_find($phone);
            $phone=$validPhone->phone;
            if(!empty($phone))
            {
                $otp=mt_rand(1000,9999);
                Log::info("Your Otp is '.$otp.' for verification sendMe App");
                // $nexmo = app('Nexmo\Client');
                // $nexmo->message()->send([
                //     'to'=>'91'.$phone,
                //     'from'=>'919090909090',
                //     'text'=>'Your Otp is '.$otp.' for verification sendMe App',
                // ]);
                $otp=[
                    'phone'=>$phone,
                    'otp'=>$otp,
                ];
                $insertOtp=$this->user_repo->addOtp($otp);
                return ['success'=>'verification code sent successfully'];
            }
           else{
               return ['error'=>'Enter Valid Number'];
           }
        } catch (Throwable $e) {
            return  Log::error("message");($e->getMessage());
        }
    }

    /**
    *   @param $otp
    *   verify Otp 
    *   @author Khushbu Waghela 
    */
    public function verifyOtp($verify)
    {
        try{
            $existingOtp=$this->user_repo->verifyOtp($verify);
            if(empty($existingOtp->otp)){
                return ["error"=> "please Enter Valid otp"];
            }else{
                return ["success"=> "LoggedIn successfully"];
            }
        }
        catch(\Throwable $e){
            return Log::error($e->getMessage());
        }
    }

}
