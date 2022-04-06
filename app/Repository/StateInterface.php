<?php

namespace App\Repository;

interface StateInterface
{
    /**
    *   @param $insertFields
    *   add new record in state table
    *   @author Khushbu Waghela 
    */
    public function store(array $insertFields);

    /**
    *   @param $id
    *   find record from state table
    *   @author Khushbu Waghela 
    */
    public function id_find($id);

    /**
    *   @param $id
    *   find country id from state table
    *   @author Khushbu Waghela 
    */
    public function country_id($id);

    /**
    *   @param $update[]
    *   get all record from State table
    *   @author Khushbu Waghela 
    */
    public function all_record();

    /**
    *   @param $update[]
    *   update record from state table
    *   @author Khushbu Waghela 
    */
    public function update(array $update);

    /**
    *   @param $id
    *   delete record from State table
    *   @author Khushbu Waghela 
    */
    public function delete(array $delete);

}
