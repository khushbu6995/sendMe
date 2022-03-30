<?php

namespace App\Repository;

use App\Models\User;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;

class UserRepository implements UserInterface
{

    /**
    *   @param $insertFields
    *   add new record in user table
    *   @author Khushbu Waghela 
    */
    public function store($insertFields)
    {
      return User::create($insertFields);
    }

    /**
    *   @param $phone
    *   find record from user table
    *   @author Khushbu Waghela 
    */
    public function phone_find($phone)
    {
      $user= User::where('phone',$phone)->first();
      return $user;
      // dd($user);
    }

     /**
    *   @param $otp
    *   find number and add otp in user table
    *   @author Khushbu Waghela 
    */
    public function addOtp($otp){
      $user= User::where('phone',$otp['phone'])->first();
      $user->otp=$otp['otp'];
      $user->save();
      return $user;
    }

    /**
    *   @param $verify[]
    *   verify otp in user table
    *   @author Khushbu Waghela 
    */
    public function verifyOtp($verify){
      // dd($verify);
      $user=User::where('phone',$verify['phone'])->where('otp',$verify['otp'])->first();
      // dd($user);
      return $user;
    }

    /**
    *   @param $update[]
    *   update record from user table
    *   @author Khushbu Waghela 
    */
    public function update(array $update){
        return User::find($update['id'])->update($update);
    }

    /**
    *   @param $id
    *   delete record from user table
    *   @author Khushbu Waghela 
    */
    public function delete($id)
    {
      return  User::find($id)->delete();
    }
}