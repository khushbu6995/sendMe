<?php

namespace App\Services;

use App\Repository\AreaRepository ;
use Throwable;
use Illuminate\Support\Facades\Log;

class AreaManagement
{   
    public function __construct(AreaRepository $area_repo)
    {
        $this->area_repo = $area_repo;
    }

    /**
    *   @param $insertFields[]
    *   call add method of area repository to add record
    *   @author Khushbu Waghela 
    */
    public function insertRecord($insertFields)
    {
        try {
            $area=$this->area_repo->store($insertFields);
            if($area)
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
    *   call update method of area repository to update record
    *   @author Khushbu Waghela 
    */
    public function updateRecord($update)
    {
        try {
           $country=$this->area_repo->update($update);
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
    *   call delete method of area repository
    *   @author Khushbu Waghela 
    */
    public function deleteRecord($id)
    {
        try {
           $country=$this->area_repo->delete($id);
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
