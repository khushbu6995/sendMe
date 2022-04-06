<?php

namespace App\Services;

use App\Repository\ProductRepository ;

use Throwable;
use Illuminate\Support\Facades\Log;

class ProductManagement
{   
    public function __construct(ProductRepository $product_repo)
    {
        $this->product_repo = $product_repo;
    }

    /**
    *   @param $insertFields[]
    *   call add method of product repository to add record
    *   @author Khushbu Waghela 
    */
    public function insertRecord($insertFields)
    {
        try {
            $product=$this->product_repo->store($insertFields);
            if($product)
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
    *   call update method of product repository to update record
    *   @author Khushbu Waghela 
    */
    public function updateRecord($update)
    {
        try {
           $product=$this->product_repo->update($update);
           if($product)
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
    *   call delete method of product repository
    *   @author Khushbu Waghela 
    */
    public function deleteRecord($id)
    {
        // dd($id);
        try {
           $product=$this->product_repo->delete($id);
        //    dd($product);
           if($product)
           {
               return ['result'=>'record deleted'];
           }
           else{
               return ['result'=>'something went wrong'];
           }
        } catch (Throwable $e) {
            return Log::error($e->getMessage());
            }
    }

}
