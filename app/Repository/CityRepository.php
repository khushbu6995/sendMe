<?php

namespace App\Repository;

use App\Models\City;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;

class CityRepository implements CityInterface
{

   /**
    *   @param $insertFields
    *   add new record in city table
    *   @author Khushbu Waghela 
    */
    public function store($insertFields)
    {
       return City::create($insertFields);
    }

    /**
    *   @param $id
    *   find record from city table
    *   @author Khushbu Waghela 
    */
    public function id_find($id)
    {
       return City::find($id);
    }

    /**
    *   @param $update[]
    *   get all record from City table
    *   @author Khushbu Waghela 
    */
    public function all_record()
    {
       return City::all();
    }

    /**
    *   @param $update[]
    *   update record from city table
    *   @author Khushbu Waghela 
    */
    public function update(array $update){
      return City::find($update['id'])->update($update);
    }

    /**
    *   @param $id
    *   delete record from city table
    *   @author Khushbu Waghela 
    */
    public function delete($id)
    {
       return City::find($id)->delete();
    }
}