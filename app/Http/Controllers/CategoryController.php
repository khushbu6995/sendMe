<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryManagement;
use App\Repository\CategoryRepository;
use App\Http\Requests\CategoryRequest;
use Throwable;
use Illuminate\Support\Facades\Log;

class categoryController extends Controller
{
    public $category_repo;
    public $class;
    public function __construct(CategoryRepository $category_repo,CategoryManagement $class)
    {
        $this->category_repo = $category_repo;
        $this->class=$class;
    }

   /**
    * get data from category
    * @author Khushbu Waghela
    */
    public function index()
    {
        try{
        return $this->category_repo->all_record();;
        }catch(Throwable $e){
            return Log::error($e->getMessage());
        }
    }

    /**
    * @param $request
    * add new category 
    * @author Khushbu Waghela
    */
    public function insertCategory(CategoryRequest $request)
    {
        try{
        $insertFields=[
            'name'=>$request->name,
        ];
        $result=$this->class->insertRecord($insertFields);
        return $result;
        }catch(Throwable $e){
            return Log::error($e->getMessage());
        }
    }
  
    /**
    * @param $request
    * edit existing category
    * @author Khushbu Waghela
    */
    public function updateCategory(Request $request)
    {
        try{
        $update=[
            'id'=>$request->id,
            'name'=>$request->name,
        ];
        $result=$this->class->updateRecord($update);
        return $result;
        }catch(Throwable $e){
            return Log::error($e->getMessage());
        }
    }

    /**
    * @param $id
    * delete existing category
    * @author Khushbu Waghela
    */
    public function deleteCategory(Request $request)
    {
        try{
        $result=$this->class->deleteRecord($request['id']);
        return $result;
        }catch(Throwable $e){
            return Log::error($e->getMessage());
        }
    }
}
