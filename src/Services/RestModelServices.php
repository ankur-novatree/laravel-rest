<?php

namespace Novatree\RestModel\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 *   RestModelServices class contains all the utility method related to restful functionality.
 *   This is the core place where all the logic implemented of this package/library.
 *
 *   In constructor method it creates a Request type of object with type-hinting and using DI
 *   (Dependency Injection) and then it assigns Class's instance property named request.
 *   So That we can easily access it throughout the classes with instance method.
 *
 *   The useModel() function  gets the model instance created in RestModelController and
 *   assign it to the class's instance property $model.Now it can be accessible throughout
 *   class instance method and property.
 *
 *   getAll() method will get all the records by query with the model instance.
 *   showById() method will get  the records by the given id, query with the model instance.
 *
 *   createRecord() method will create an instance of that model and assign all attributes
 *   using request object to the model properties.
 *
 *   updateRecord() method will get the model instance by given id.Then it will update the
 *   Attributes using Request object.
 *
 *   deleteRecord()  method will get the instance of model type by the id given.
 *   Then it will delete that instance/record.
 *
 * @return String
 */

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