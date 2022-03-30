<?php

namespace App\Services;

use App\Repository\CategoryRepository ;
use Throwable;
use Illuminate\Support\Facades\Log;

class CategoryManagement
{   
    public function __construct(CategoryRepository $category_repo)
    {
        $this->category_repo = $category_repo;
    }

    /**
    *   @param $insertFields[]
    *   call add method of category repository to add record
    *   @author Khushbu Waghela 
    */
    public function insertRecord($insertFields)
    {
        try {
            $category= $this->category_repo->store($insertFields);
            if($category)
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
    *   call update method of category repository to update record
    *   @author Khushbu Waghela 
    */
    public function updateRecord($update)
    {
        try {
           $country=$this->category_repo->update($update);
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
    *   call delete method of category repository
    *   @author Khushbu Waghela 
    */
    public function deleteRecord($id)
    {
        try {
           $country=$this->category_repo->delete($id);
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
