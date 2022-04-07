<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AreaManagement;
use App\Repository\AreaRepository;
use App\Repository\CityRepository;
use App\Repository\StateRepository;
use App\Repository\CountryRepository;
use App\Http\Requests\AreaRequest;
use Throwable;
use Illuminate\Support\Facades\Log;

class areaController extends Controller
{
    public $area_repo;
    public $city_repo;
    public $state_repo;
    public $country_repo;
    public $class;
    public function __construct(AreaRepository $area_repo,CityRepository $city_repo,StateRepository $state_repo,CountryRepository $country_repo,AreaManagement $class)
    {
      $this->area_repo = $area_repo;
      $this->city_repo = $city_repo;
      $this->state_repo = $state_repo;
      $this->country_repo = $country_repo;
      $this->class=$class;
    }

    /**
    * get data from area
    * @author Khushbu Waghela
    */
    public function index()
    {
        try{
        return $this->area_repo->all_record();;
        }catch(Throwable $e){
            return Log::error($e->getMessage());
        }
    }

    /**
    * @param $request
    * add new area 
    * @author Khushbu Waghela
    */
    public function insertArea(AreaRequest $request)
    {
        try{
        $insertFields=[
            'name'=>$request->name,
            'city_id'=>$request->city,
            'state_id'=>$request->state,
            'country_id'=>$request->country,
        ];
        $result=$this->class->insertRecord($insertFields);
        return $result;
        }catch(Throwable $e){
            return Log::error($e->getMessage());
        }
    }

    /**
    * @param $request
    * edit existing area
    * @author Khushbu Waghela
    */
    public function updateArea(Request $request)
    {
        try{
        $update=[
            'id'=>$request->id,
            'name'=>$request->name,
            'city_id'=>$request->city,
            'state_id'=>$request->state,
            'country_id'=>$request->country,
        ];
        $result=$this->class->updateRecord($update);
        return $result;
        }catch(Throwable $e){
            return Log::error($e->getMessage());
        }
    }

    /**
    * @param $id
    * delete existing area
    * @author Khushbu Waghela
    */
    public function deleteArea(Request $request)
    {
        try{
        $result=$this->class->deleteRecord($request['id']);
        return $result;
        }catch(Throwable $e){
            return Log::error($e->getMessage());
        }
    }
}
