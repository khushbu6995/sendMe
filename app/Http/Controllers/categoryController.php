<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Services\CategoryManagement;
use Illuminate\Support\Facades\App;
use App\Repository\CategoryRepository;
use App\Http\Requests\categoryRequest;
class categoryController extends Controller
{
    public $category_repo;
    public function __construct(CategoryRepository $category_repo)
    {
    $this->category_repo = $category_repo;
    }

   /**
    * get data from category
    * @author Khushbu Waghela
    */
    public function index()
    {
        return Category::all();
    }

    /**
    * add new category form
    * @author Khushbu Waghela
    */
    public function addCategory()
    {
        return view('add_category');
    }

    /**
    * @param $request
    * add new category 
    * @author Khushbu Waghela
    */
    public function insertCategory(Request $request)
    {
        $insertFields=[
            'name'=>$request->name,
        ];
        $class = App::make(CategoryManagement::class);
        $result=$class->insertRecord($insertFields);
        return $result;
    }
    /**
    * edit category form
    * @author Khushbu Waghela
    */
    public function editCategory($id)
    {
        $category=$this->category_repo->id_find($id);
        return view('edit_category',compact('category'));
    }

    /**
    * @param $request
    * edit existing category
    * @author Khushbu Waghela
    */
    public function updateCategory(Request $request)
    {
        $update=[
            'id'=>$request->id,
            'name'=>$request->name,
        ];
        $class = App::make(CategoryManagement::class);
        $result=$class->updateRecord($update);
        return $result;
    }

    /**
    * @param $id
    * delete existing category
    * @author Khushbu Waghela
    */
    public function deleteCategory($id)
    {
        $class = App::make(CategoryManagement::class);
        $result=$class->deleteRecord($id);
        return $result;
    }
}
