<?php

namespace App\Services;

use App\Repository\CountryRepository ;
use Throwable;
use Illuminate\Support\Facades\Log;

class CountryManagement
{   
    public $country_repo;
    public function __construct(CountryRepository $country_repo)
    {
        $this->country_repo = $country_repo;
    }

    /**
    *   @param $insertFields[]
    *   call add method of country repository to add record
    *   @author Khushbu Waghela 
    */
    public function insertRecord($insertFields)
    {
        // dd($insertFields);
        try {
           $country=$this->country_repo->store($insertFields);
        //    dd($country);
           if($country)
           {
               return ['result'=>'record inserted'];
           }
           else{
               return ['result'=>'something went wrong'];
           }
        } catch (Throwable $e) {
              Log::info($e->getMessage());
            return view('error.error');
        }
    }

    /**
    *   @param $update[]
    *   call update method of country repository to update record
    *   @author Khushbu Waghela 
    */
    public function updateRecord($update)
    {
        try {
           $country=$this->country_repo->update($update);
           if($country)
           {
               return ['result'=>'record updated'];
           }
           else{
               return ['result'=>'something went wrong'];
           }
        } catch (Throwable $e) {
              Log::info($e->getMessage());
            return view('error.error');
        }
    }

    /**
    *   @param $id
    *   call delete method of country repository
    *   @author Khushbu Waghela 
    */
    public function deleteRecord($id)
    {
        try {
           $country=$this->country_repo->delete($id);
           if($country)
           {
               return ['result'=>'record deleted'];
           }
           else{
               return ['result'=>'something went wrong'];
           }
        } catch (Throwable $e) {
              Log::info($e->getMessage());
            return view('error.error');
        }
    }

}
