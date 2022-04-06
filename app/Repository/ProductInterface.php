<?php

namespace App\Repository;

interface ProductInterface
{
    /**
    *   get all record from product table
    *   @author Khushbu Waghela 
    */
    public function all_record();
    /**
    *   @param $insertFields
    *   add new record in product table
    *   @author Khushbu Waghela 
    */
    public function store(array $insertFields);

    /**
    *   @param $id
    *   find record from product table
    *   @author Khushbu Waghela 
    */
    public function id_find($id);

    /**
    *   @param $id
    *   find category id from product table
    *   @author Khushbu Waghela 
    */
    public function category_id($id);

    /**
    *   @param $update[]
    *   update record from product table
    *   @author Khushbu Waghela 
    */
    public function update(array $update);

    /**
    *   @param $id
    *   delete record from product table
    *   @author Khushbu Waghela 
    */
    public function delete(array $delete);

}
