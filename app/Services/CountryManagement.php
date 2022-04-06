<?php

namespace App\Services;

use App\Repository\AreaRepository;
use App\Repository\CityRepository;
use App\Repository\CountryRepository ;
use App\Repository\StateRepository;
use Throwable;
use Illuminate\Support\Facades\Log;

class CountryManagement
{   
    public $country_repo;
    public $state_repo;
    public $city_repo;
    public $area_repo;
    public function __construct(CountryRepository $country_repo,StateRepository $state_repo,CityRepository $city_repo,AreaRepository $area_repo)
    {
        $this->country_repo = $country_repo;
        $this->state_repo = $state_repo;
        $this->city_repo = $city_repo;
        $this->area_repo = $area_repo;
    }

    /**
    *   @param $insertFields[]
    *   call add method of country repository to add record
    *   @author Khushbu Waghela 
    */
    public function insertRecord($insertFields)
    {
        try {
           $country=$this->country_repo->store($insertFields);
           if($country)
           {
               return ['success: '=>'record inserted','data :'=>$country];
           }
           else{
               return ['error: '=>'something went wrong'];
           }
        } catch (Throwable $e) {
            return  Log::info($e->getMessage());
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
               return ['success :'=>'record updated'];
           }
           else{
               return ['error'=>'something went wrong'];
           }
        } catch (Throwable $e) {
            return  Log::error($e->getMessage());
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
            $state=$this->state_repo->country_id($id);
            $city=$this->city_repo->country_id($id);
            $area=$this->area_repo->country_id($id);
            if(!empty($state) && !empty($city) && !empty($area)){
                return ['error'=>'country already assigned'];
            }else{
                $country=$this->country_repo->delete($id);
                if($country)
                {
                    return ['result'=>'record deleted'];
                }
                else{
                    return ['result'=>'something went wrong'];
                }
            }
        } catch (Throwable $e) {
            return  Log::error($e->getMessage());
        }
    }

}
