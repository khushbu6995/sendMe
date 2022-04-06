<?php

namespace App\Services;

use App\Repository\CategoryRepository ;
use App\Repository\ProductRepository ;
use Throwable;
use Illuminate\Support\Facades\Log;

class CategoryManagement
{   
    public $category_repo;
    public $product_repo;
    public function __construct(CategoryRepository $category_repo,ProductRepository $product_repo)
    {
        $this->category_repo = $category_repo;
        $this->product_repo = $product_repo;
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
            return  Log::error($e->getMessage());
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
            return  Log::error($e->getMessage());
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
        $category_id=$this->product_repo->category_id($id);
        if(!empty($category_id)){
            return ['error'=>'id already assigned'];
        }else{
            $country=$this->category_repo->delete($id);
            if($country)
            {
                return ['result'=>'record deleted'];
            }else{
                return ['result'=>'something went wrong'];
            }
        }
        } catch (Throwable $e) {
              Log::info($e->getMessage());
            // return view('error.error');
            return $e;
        
        }
    }


}
