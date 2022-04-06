<?php

namespace App\Repository;

interface UserInterface
{
    /**
    *   get all record from user table
    *   @author Khushbu Waghela 
    */
    public function all_record();

    /**
    *   @param $insertFields
    *   add new record in user table
    *   @author Khushbu Waghela 
    */
    public function store(array $insertFields);

    /**
    *   @param $phone
    *   find record from user table
    *   @author Khushbu Waghela 
    */
    public function phone_find($phone);

    /**
    *   @param $otp
    *   find number and add otp in user table
    *   @author Khushbu Waghela 
    */
    public function addOtp($otp);

    /**
    *   @param $verify[]
    *   verify otp in user table
    *   @author Khushbu Waghela 
    */
    public function verifyOtp($verify);

    /**
    *   @param $update[]
    *   update record from user table
    *   @author Khushbu Waghela 
    */
    public function update(array $update);

    /**
    *   @param $id
    *   delete record from user table
    *   @author Khushbu Waghela 
    */
    public function delete(array $delete);

}
