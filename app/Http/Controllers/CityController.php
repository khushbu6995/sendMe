<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CityManagement;
use App\Repository\CityRepository;
use App\Repository\StateRepository;
use App\Repository\CountryRepository;
use App\Http\Requests\CityRequest;
use Throwable;
use Illuminate\Support\Facades\Log;

class cityController extends Controller
{
    public $city_repo;
    public $state_repo;
    public $country_repo;
    public $class;
    public function __construct(CityRepository $city_repo,StateRepository $state_repo,CountryRepository $country_repo,CityManagement $class)
    {
        $this->city_repo = $city_repo;
        $this->state_repo = $state_repo;
        $this->class=$class;
    }

    /**
    * get data from city
    * @author Khushbu Waghela
    */
    public function index()
    {
        try{
        return $this->city_repo->all_record();;
        }catch(Throwable $e)
        {
            return Log::error($e->getMessage);
        }
    }

    /**
    * @param $request
    * add new city 
    * @author Khushbu Waghela
    */
    public function insertCity(CityRequest $request)
    {
        try{
        $insertFields=[
            'name'=>$request->name,
            'state_id'=>$request->state,
            'country_id'=>$request->country,
        ];
        $result=$this->class->insertRecord($insertFields);
        return $result;
        }catch(Throwable $e)
        {
            return Log::error($e->getMessage);
        }
    }

    /**
    * @param $request
    * edit existing city
    * @author Khushbu Waghela
    */
    public function updateCity(Request $request)
    {
        try{
        $update=[
            'id'=>$request->id,
            'name'=>$request->name,
            'state_id'=>$request->state,
            'country_id'=>$request->country,
        ];
        $result=$this->class->updateRecord($update);
        return $result;
        }catch(Throwable $e)
        {
            return Log::error($e->getMessage);
        }
    }

    /**
    * @param $id
    * delete existing city
    * @author Khushbu Waghela
    */
    public function deleteCity(Request $request)
    {
        try{
        $result=$this->class->deleteRecord($request['id']);
        return $result;
        }catch(Throwable $e)
        {
            return Log::error($e->getMessage);
        }
    }
}
