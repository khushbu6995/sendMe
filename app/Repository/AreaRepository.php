<?php

namespace App\Repository;

use App\Models\Area;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;

class AreaRepository implements AreaInterface
{
    /**
    *   @param $insertFields
    *   add new record in area table
    *   @author Khushbu Waghela 
    */
    public function store($insertFields)
    {
        return Area::create($insertFields);
    }

    /**
    *   @param $id
    *   find record from area table
    *   @author Khushbu Waghela 
    */
    public function id_find($id)
    {
       return Area::find($id);
    }

    /**
    *   @param $update[]
    *   get all record from area table
    *   @author Khushbu Waghela 
    */
    public function all_record()
    {
       return Area::all();
    }

    /**
    *   @param $update[]
    *   update record from area table
    *   @author Khushbu Waghela 
    */
    public function update(array $update){
       return Area::find($update['id'])->update($update);
    }

     /**
    *   @param $id
    *   delete record from area table
    *   @author Khushbu Waghela 
    */
    public function delete($id)
    {
       return  Area::find($id)->delete();
    }

    /**
    *   @param $id
    *   find state id from area table
    *   @author Khushbu Waghela 
    */
    public function state_id($id){
      return Area::where('state_id',$id)->get();
   }

   /**
    *   @param $id
    *   find city id from area table
    *   @author Khushbu Waghela 
    */
    public function city_id($id){
      return Area::where('city_id',$id)->get();
   }

   /**
   *   @param $id
   *   find country id from area table
   *   @author Khushbu Waghela 
   */
   public function country_id($id){
      return Area::where('country_id',$id)->get();
   }
}
