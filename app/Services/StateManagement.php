<?php

namespace App\Services;

use App\Repository\StateRepository ;
use Throwable;
use Illuminate\Support\Facades\Log;

class StateManagement
{  
    public $state_repo; 
    public function __construct(StateRepository $state_repo)
    {
        $this->state_repo = $state_repo;
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
    *   call update method of state repository to update record
    *   @author Khushbu Waghela 
    */
    public function updateRecord($update)
    {
        try {
           $country=$this->state_repo->update($update);
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
    *   call delete method of state repository
    *   @author Khushbu Waghela 
    */
    public function deleteRecord($id)
    {
        try {
           $country=$this->state_repo->delete($id);
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
