<?php

namespace App\Repository;

use App\Models\State;
use phpDocumentor\Reflection\PseudoTypes\LowercaseString;

class StateRepository implements StateInterface
{
    /**
    *   @param $insertFields
    *   add new record in state table
    *   @author Khushbu Waghela 
    */
    public function store($insertFields)
    {
        return State::create($insertFields);
    }

    /**
    *   @param $id
    *   find record from state table
    *   @author Khushbu Waghela 
    */
    public function id_find($id)
    {
       return State::find($id);
    }

    /**
    *   @param $id
    *   find country id from state table
    *   @author Khushbu Waghela 
    */
    public function country_id($id){
        return State::where('country_id',$id)->get();
    }

    /**
    *   @param $update[]
    *   get all record from State table
    *   @author Khushbu Waghela 
    */
    public function all_record()
    {
       return State::all();
    }

    /**
    *   @param $update[]
    *   update record from state table
    *   @author Khushbu Waghela 
    */
    public function update(array $update){
        return State::find($update['id'])->update($update);
    }

    /**
    *   @param $id
    *   delete record from State table
    *   @author Khushbu Waghela 
    */
    public function delete($id)
    {
       return State::find($id)->delete();
    }
}
