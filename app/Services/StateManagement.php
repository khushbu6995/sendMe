<?php

namespace App\Services;

use App\Repository\AreaRepository;
use App\Repository\CityRepository;
use App\Repository\StateRepository ;
use Throwable;
use Illuminate\Support\Facades\Log;

class StateManagement
{  
    public $state_repo; 
    public $city_repo; 
    public $area_repo; 
    public function __construct(StateRepository $state_repo,CityRepository $city_repo,AreaRepository $area_repo)
    {
        $this->state_repo = $state_repo;
        $this->city_repo = $city_repo;
        $this->area_repo = $area_repo;
    }

    /**
    *   @param $insertFields[]
    *   call add method of state repository to add record
    *   @author Khushbu Waghela 
    */
    public function insertRecord($insertFields)
    {
        try {
           $state= $this->state_repo->store($insertFields);
            if($state)
            {
                return ['result'=>'record inserted','data'=>$state];
            }
            else{
                return ['result'=>'something went wrong'];
            }
        } catch (Throwable $e) {
            return Log::error($e->getMessage());
        }
    }

    /**
    *   @param $update[]
    *   call update method of state repository to update record
    *   @author Khushbu Waghela 
    */
    public function updateRecord($update)
    {
        try {
           $state=$this->state_repo->update($update);
           if($state)
           {
               return ['result'=>'record updated'];
           }
           else{
               return ['result'=>'something went wrong'];
           }
        } catch (Throwable $e) {
            return Log::error($e->getMessage());
        }
    }

    /**
    *   @param $id
    *   call delete method of state repository
    *   @author Khushbu Waghela 
    */
    public function deleteRecord($id)
    {
        try {
            $city=$this->city_repo->state_id($id);
            $area=$this->area_repo->state_id($id);
            if(!empty($city) && !empty($area)){
                return ['error'=>'State already assigned'];
            }else{
                $country=$this->state_repo->delete($id);
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
