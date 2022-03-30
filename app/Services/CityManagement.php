<?php

namespace App\Services;

use App\Repository\CityRepository ;

use Throwable;
use Illuminate\Support\Facades\Log;

class CityManagement
{   
    public $city_repo;
    public function __construct(CityRepository $city_repo)
    {
        $this->city_repo = $city_repo;
    }

    /**
    *   @param $insertFields[]
    *   call add method of city repository to add record
    *   @author Khushbu Waghela 
    */
    public function insertRecord($insertFields)
    {
        // dd($insertFields);
        try {
            $city=$this->city_repo->store($insertFields);
            // dd($city);
            if($city)
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
    *   call update method of city repository to update record
    *   @author Khushbu Waghela 
    */
    public function updateRecord($update)
    {
        try {
           $country=$this->city_repo->update($update);
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
    *   call delete method of city repository
    *   @author Khushbu Waghela 
    */
    public function deleteRecord($id)
    {
        try {
           $country=$this->city_repo->delete($id);
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
