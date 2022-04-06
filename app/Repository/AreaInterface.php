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

     /**
    *   @param $id
    *   find state id from area table
    *   @author Khushbu Waghela 
    */
    public function state_id($id);
  
     /**
      *   @param $id
      *   find city id from area table
      *   @author Khushbu Waghela 
      */
      public function city_id($id);
  
     /**
     *   @param $id
     *   find country id from area table
     *   @author Khushbu Waghela 
     */
     public function country_id($id);
}
