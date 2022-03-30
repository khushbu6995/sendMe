<?php

namespace App\Repository;

interface AreaInterface
{
    /**
    *   @param $insertFields
    *   add new record in area table
    *   @author Khushbu Waghela 
    */
    public function store(array $insertFields);

    /**
    *   @param $id
    *   find record from area table
    *   @author Khushbu Waghela 
    */
    public function id_find($id);

    /**
    *   @param $update[]
    *   get all record from area table
    *   @author Khushbu Waghela 
    */
    public function all_record();

    /**
    *   @param $update[]
    *   update record from area table
    *   @author Khushbu Waghela 
    */
    public function update(array $update);

    /**
    *   @param $id
    *   delete record from area table
    *   @author Khushbu Waghela 
    */
    public function delete(array $delete);

}
