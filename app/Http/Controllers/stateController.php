<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use Illuminate\Support\Facades\App;
use App\Services\StateManagement;
use App\Repository\StateRepository;
use App\Repository\CountryRepository;
use App\Http\Requests\stateRequest;
use App\Models\Country;

class stateController extends Controller
{
  public $state_repo;
  public $country_repo;
  public function __construct(StateRepository $state_repo,CountryRepository $country_repo)
  {
    $this->state_repo = $state_repo;
    $this->country_repo = $country_repo;

  }
   /**
    * get data from state 
    * @author Khushbu Waghela
    */
    public function index()
    {
        return State::all();
    }

    /**
    * add new state form
    * @author Khushbu Waghela
    */
    public function addState()
    {
        $countries=Country::all();
        return view('add_state',compact('countries'));
    }

    /**
    * @param $request
    * add new state 
    * @author Khushbu Waghela
    */
    public function insertState(Request $request)
    {        
        $insertFields=[
            'name'=>$request->name,
            'country_id'=>$request->country,
        ];
        $class = App::make(StateManagement::class);
        $result=$class->insertRecord($insertFields);
        return $result;
    }

    /**
    * edit state form
    * @author Khushbu Waghela
    */
    public function editState($id)
    {
    $state=$this->state_repo->id_find($id);
    $countries=$this->country_repo->all_record();
    return view('edit_state',compact('state','countries'));
    }

    /**
    * @param $request
    * edit existing state
    * @author Khushbu Waghela
    */
    public function updateState(Request $request)
    {
        $update=[
            'id'=>$request->id,
            'name'=>$request->name,
            'country_id'=>$request->country,
        ];
        $class = App::make(StateManagement::class);
        $result=$class->updateRecord($update);
        return $result;
    }

    /**
    * @param $id
    * delete existing state
    * @author Khushbu Waghela
    */
    public function deleteState($id)
    {
        $class = App::make(StateManagement::class);
        $result=$class->deleteRecord($id);
        return $result;
    }
}
