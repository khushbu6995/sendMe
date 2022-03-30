<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Category;
use App\Services\ProductManagement;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use App\Http\Requests\productRequest;

class productController extends Controller
{
    public $product_repo;
    public $category_repo;
    public function __construct(ProductRepository $product_repo,CategoryRepository $category_repo)
    {
    $this->category_repo = $category_repo;
    $this->product_repo = $product_repo;
    }

   /**
    * get data from product
    * @author Khushbu Waghela
    */
    public function index()
    {
        return Product::all();
    }

    /**
    * add new product form
    * @author Khushbu Waghela
    */
    public function addProduct()
    {
        $categories=Category::all();
        return view('add_product',compact('categories'));
    }

    /**
    * @param $request
    * add new product 
    * @author Khushbu Waghela
    */
    public function insertProduct(Request $request)
    {
        $insertFields=[
            'name'=>$request->name,
            'category_id'=>$request->category,
        ];
        $class = App::make(ProductManagement::class);
        $result=$class->insertRecord($insertFields);
        return $result;
    }

    /**
    * edit product form
    * @author Khushbu Waghela
    */
    public function editProduct($id)
    {
        $product=$this->product_repo->id_find($id);
        $categories=$this->category_repo->all_record();
        return view('edit_product',compact('product','categories'));
    }

    /**
    * @param $request
    * edit existing product
    * @author Khushbu Waghela
    */
    public function updateProduct(Request $request)
    {
        $update=[
            'id'=>$request->id,
            'name'=>$request->name,
            'category_id'=>$request->category,
        ];
        $class = App::make(ProductManagement::class);
        $result=$class->updateRecord($update);
        return $result;
    }

    /**
    * @param $id
    * delete existing product
    * @author Khushbu Waghela
    */
    public function deleteProduct($id)
    {
        $class = App::make(ProductManagement::class);
        $result=$class->deleteRecord($id);
        return $result;
    }
}
