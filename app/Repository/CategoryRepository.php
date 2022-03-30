<?php

namespace App\Repository;

use App\Models\Category;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;

class CategoryRepository implements CategoryInterface
{
    /**
    *   @param $insertFields
    *   add new record in category table
    *   @author Khushbu Waghela 
    */
    public function store($insertFields)
    {
        return Category::create($insertFields);
    }

    /**
    *   @param $id
    *   find record from category table
    *   @author Khushbu Waghela 
    */
    public function id_find($id)
    {
       return Category::find($id);
    }

    /**
    *   @param $update[]
    *   get all record from Category table
    *   @author Khushbu Waghela 
    */
    public function all_record()
    {
       return Category::all();
    }

    /**
    *   @param $update[]
    *   update record from category table
    *   @author Khushbu Waghela 
    */
    public function update(array $update){
       return Category::find($update['id'])->update($update);
    }

    /**
    *   @param $id
    *   delete record from category table
    *   @author Khushbu Waghela 
    */
    public function delete($id)
    {
       return Category::find($id)->delete();
    }
}
