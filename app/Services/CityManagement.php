<?php

namespace App\Services;

use App\Repository\AreaRepository;
use App\Repository\CityRepository ;

use Throwable;
use Illuminate\Support\Facades\Log;

class CityManagement
{   
    public $city_repo;
    public $area_repo;
    public function __construct(CityRepository $city_repo,AreaRepository $area_repo)
    {
        $this->city_repo = $city_repo;
        $this->area_repo = $area_repo;
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
            if($city)
            {
                return ['result'=>'record inserted','data'=>$city];
            }
            else{
                return ['result'=>'something went wrong'];
            }
        }catch (Throwable $e) {
            return  Log::error($e->getMessage());
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
           $city=$this->city_repo->update($update);
           if($city)
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
    *   call delete method of city repository
    *   @author Khushbu Waghela 
    */
    public function deleteRecord($id)
    {
        try {
            $area=$this->area_repo->city_id($id);
            if(!empty($area)){
                return ['error'=>'City already assigned'];
            }else{
                $country=$this->city_repo->delete($id);
                if($country)
                {
                    return ['result'=>'record deleted'];
                }
                else{
                    return ['result'=>'something went wrong'];
                }
        }
        } catch (Throwable $e) {
              return Log::error($e->getMessage());
        }
    }

}
