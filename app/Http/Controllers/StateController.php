<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use Illuminate\Support\Facades\App;
use App\Services\StateManagement;
use App\Repository\StateRepository;
use App\Repository\CountryRepository;
use App\Http\Requests\StateRequest;
use App\Models\Country;
use Throwable;
use Illuminate\Support\Facades\Log;

class stateController extends Controller
{
  public $state_repo;
  public $country_repo;
  public $class;
  public function __construct(StateRepository $state_repo,CountryRepository $country_repo,StateManagement $class)
  {
    $this->state_repo = $state_repo;
    $this->country_repo = $country_repo;
    $this->class=$class;
  }
   /**
    * get data from state 
    * @author Khushbu Waghela
    */
    public function index()
    {
        try{
        return $this->state_repo->all_record();
        }catch(Throwable $e)
        {
            return Log::error($e->getMessage());
        }
    }

    /**
    * @param $request
    * add new state 
    * @author Khushbu Waghela
    */
    public function insertState(StateRequest $request)
    { 
        try{       
        $insertFields=[
            'name'=>$request->name,
            'country_id'=>$request->country,
        ];
        $result=$this->class->insertRecord($insertFields);
        return $result;
        }catch(Throwable $e)
        {
            return Log::error($e->getMessage());
        }
    }

    /**
    * @param $request
    * edit existing state
    * @author Khushbu Waghela
    */
    public function updateState(Request $request)
    {
        try{
        $update=[
            'id'=>$request->id,
            'name'=>$request->name,
            'country_id'=>$request->country,
        ];
        $result=$this->class->updateRecord($update);
        return $result;
        }catch(Throwable $e)
        {
            return Log::error($e->getMessage());
        }
    }

    /**
    * @param $id
    * delete existing state
    * @author Khushbu Waghela
    */
    public function deleteState(Request $request)
    {
        try{
        $result=$this->class->deleteRecord($request['id']);
        return $result;
        }catch(Throwable $e)
        {
            return Log::error($e->getMessage());
        }
    }
}
