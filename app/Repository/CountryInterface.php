<?php

namespace App\Repository;

interface CountryInterface
{
    /**
    *   @param $insertFields
    *   add new record in country table
    *   @author Khushbu Waghela 
    */
    public function store(array $insertFields);
    
    /**
    *   @param $id
    *   find record from country table
    *   @author Khushbu Waghela 
    */
    public function id_find($id);

    /**
    *   @param $update[]
    *   get all record from Country table
    *   @author Khushbu Waghela 
    */
    public function all_record();

    /**
    *   @param $update[]
    *   update record from country table
    *   @author Khushbu Waghela 
    */
    public function update(array $update);

    /**
    *   @param $id
    *   delete record from Country table
    *   @author Khushbu Waghela 
    */
    public function delete(array $delete);

}
