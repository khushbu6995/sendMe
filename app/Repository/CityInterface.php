<?php

namespace App\Repository;

interface CityInterface
{
    /**
    *   @param $insertFields
    *   add new record in city table
    *   @author Khushbu Waghela 
    */
    public function store(array $insertFields);

    /**
    *   @param $id
    *   find record from city table
    *   @author Khushbu Waghela 
    */
    public function id_find($id);

    /**
    *   @param $update[]
    *   get all record from City table
    *   @author Khushbu Waghela 
    */
    public function all_record();

    /**
    *   @param $update[]
    *   update record from city table
    *   @author Khushbu Waghela 
    */
    public function update(array $update);

    /**
    *   @param $id
    *   delete record from city table
    *   @author Khushbu Waghela 
    */
    public function delete(array $delete);

}
