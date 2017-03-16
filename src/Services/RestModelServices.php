<?php

namespace Novatree\RestModel\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class  RestModelServices{

    protected $model;
    protected $request;
    public function __construct(Request $request)
    {
    $this->request =$request;
    }
    public function useModel(Model $model){
        $this->model =$model;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        try{
            return $this->model->all()->toJson();
        }
        catch (\Exception $e){
            return $e->getMessage();
        }

    }
    public function showById($request){
        try{
            $this->request =$request;
            $modelSlug =$this->request->segment(4);
            return $this->model->findOrFail($modelSlug)->toJson();
        }
        catch (\Exception $e){
            return $e->getMessage();
        }

    }
    public  function createRecord($request){
        try{
            $this->request =$request;
            $modelAttr =$this->model->getFillable();
            foreach ($modelAttr as $key => $attr){
                $this->model->$attr = $this->request->$attr;
            }

            $this->model->save();
            return 'Record created Successfully';
        }
        catch (\Exception $e){
          return  $e->getMessage();
        }
    }

    public  function updateRecord($request){
        try{
            $this->request =$request;
            $slug =$this->request->segment(4);
            $requestArray = $this->request->all();
            $modelAttr =$this->model->find($slug);
            foreach ($requestArray as $attr => $value){
                $modelAttr->$attr = $value;
            }

            $modelAttr->update();
            return 'Record Updated Successfully';
        }
        catch (\Exception $e){
            return  $e->getMessage();
        }
    }
    public function deleteRecord($request){

        try{
            $this->request =$request;
            $modelSlug =$this->request->segment(4);
            $model =$this->model->findOrFail($modelSlug);
            $model->delete();
            return 'record deleted Successfully';
        }
        catch (\Exception $e){
            return $e->getMessage();
        }
    }
}