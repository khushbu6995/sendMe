<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductManagement;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use App\Http\Requests\ProductRequest;
use Throwable;
use Illuminate\Support\Facades\Log;

class productController extends Controller
{
    public $product_repo;
    public $category_repo;
    public $class;
    public function __construct(ProductRepository $product_repo,CategoryRepository $category_repo,ProductManagement $class)
    {
        $this->category_repo = $category_repo;
        $this->product_repo = $product_repo;
        $this->class=$class;
    }

   /**
    * get data from product
    * @author Khushbu Waghela
    */
    public function index()
    {
        try{
        return $this->product_repo->all_record();
        }catch(Throwable $e)
        {
            return Log::error($e->getMessage());
        }
    }

    /**
    * @param $request
    * add new product 
    * @author Khushbu Waghela
    */
    public function insertProduct(ProductRequest $request)
    {
        try{
        $insertFields=[
            'name'=>$request->name,
            'category_id'=>$request->category,
        ];
        $result=$this->class->insertRecord($insertFields);
        return $result;
        }catch(Throwable $e)
        {
            return Log::error($e->getMessage());
        }
    }

    /**
    * @param $request
    * edit existing product
    * @author Khushbu Waghela
    */
    public function updateProduct(Request $request)
    {
        try{
        $update=[
            'id'=>$request->id,
            'name'=>$request->name,
            'category_id'=>$request->category,
        ];
        $result=$this->class->updateRecord($update);
        return $result;
        }catch(Throwable $e)
        {
            return Log::error($e->getMessage());
        }
    }

    /**
    * @param $id
    * delete existing product
    * @author Khushbu Waghela
    */
    public function deleteProduct(Request $request)
    {
        try{
        $result=$this->class->deleteRecord($request['id']);
        return $result;
        }catch(Throwable $e)
        {
            return Log::error($e->getMessage());
        }
    }
}
