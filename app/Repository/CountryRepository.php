<?php

namespace App\Repository;

use App\Models\Country;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;

class CountryRepository implements CountryInterface
{

    /**
    *   @param $insertFields
    *   add new record in country table
    *   @author Khushbu Waghela 
    */
    public function store($insertFields)
    {
        $country=Country::create($insertFields);
        return $country;
    }

    /**
    *   @param $id
    *   find record from country table
    *   @author Khushbu Waghela 
    */
    public function id_find($id)
    {
       return Country::find($id);
    }

    /**
    *   @param $update[]
    *   get all record from Country table
    *   @author Khushbu Waghela 
    */
    public function all_record(){
        return Country::all();
    }

    /**
    *   @param $update[]
    *   update record from country table
    *   @author Khushbu Waghela 
    */
    public function update(array $update){
        return Country::find($update['id'])->update($update);
    }

    /**
    *   @param $id
    *   delete record from Country table
    *   @author Khushbu Waghela 
    */
    public function delete($id)
    {
        return Country::find($id)->delete();
    }
}
