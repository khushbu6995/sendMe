<?php

namespace App\Repository;

use App\Models\Product;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;

class ProductRepository implements ProductInterface
{
     /**
    *   @param $update[]
    *   get all record from Country table
    *   @author Khushbu Waghela 
    */
    public function all_record(){
        return Product::all();
    }

    /**
    *   @param $insertFields
    *   add new record in product table
    *   @author Khushbu Waghela 
    */
    public function store($insertFields)
    {
        return Product::create($insertFields);
    }

    /**
    *   @param $id
    *   find record from product table
    *   @author Khushbu Waghela 
    */
    public function id_find($id)
    {
       return Product::find($id);
    }

    /**
    *   @param $id
    *   find category id from product table
    *   @author Khushbu Waghela 
    */
    public function category_id($id){
        return Product::where('category_id',$id)->get();
    }

    /**
    *   @param $update[]
    *   update record from product table
    *   @author Khushbu Waghela 
    */
    public function update(array $update){
        return Product::find($update['id'])->update($update);
    }

    /**
    *   @param $id
    *   delete record from product table
    *   @author Khushbu Waghela 
    */
    public function delete($id)
    {
        return Product::find($id)->delete();
    }
}
