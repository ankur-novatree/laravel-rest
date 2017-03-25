<?php

namespace Novatree\Rest\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class RestController extends Controller
{
    /**
     * The application's Constructor that initializes the model name from url.
     * Then it will create a model of it (the model should be inside the  App directory).
     * Then it will call the useModel method of Rest Service using Rest Facade.
     *
     *
     * It is surrounded with try catch block. If the model is not found in App\ directory
     * an exception will be thrown.
     *
     *
     */
    protected $model;

    public function __construct(Request $request)
    {
        try {
            $model = 'App\\' . $request->segment(2);
            $this->model = new $model();
        } catch (\Exception $exception) {
            $exception->getMessage();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * This will fetch all results of that model uses the Table/Schema.
     * It will call Rest Facades getAll() to fetch all records from the query.
     *
     *
     * @call   getAll()
     * @return  response
     * Returns Json String
     */
    public function allRecords()
    {
        try {
            return $this->model->all()->toJson();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     *  Show the form for creating a new resource.
     *  This will create a record of that model that uses Table/Schema.
     *
     * @param Request $request
     * @return String
     */
    public function create(Request $request)
    {
        try {
            $attributes = $this->model->getFillable();
            foreach ($attributes as $attribute) {
                $this->model->$attribute = $request->$attribute;
            }
            $response = $this->model->save();
            if ($response == true) {
                return Response::HTTP_CREATED;
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     *  This will fetch a result of that model uses the Table/Schema with id(Primary Key).
     * It uses Rest Facades showById method to get the result.
     *
     *
     * @param  Request $request
     * @return  JsonResponse
     */
    public function show(Request $request)
    {
        try {
            $modelId = $request->segment(3);
            return $this->model->findOrFail($modelId)->toJson();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     *  This will update a record of that model uses the Table/Schema with id(Primary Key)
     *  given as a parameter. It uses Rest Facade's updateRecord to operate.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return  Response
     */
    public function update(Request $request)
    {
        try {
            $model_id = $request->segment(3);
            $attributes = $request->all();
            $object = $this->model->find($model_id);
            foreach ($attributes as $attribute => $value) {
                $object->$attribute = $value;
            }
            $response = $object->update();
            if ($response == true) {
                return Response::HTTP_ACCEPTED;
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     *  This will delete a record of that model uses the Table/Schema with id(Primary Key)
     *  given as a parameter. It uses Rest Facade's deleteRecord to operate.
     *
     * @param  Request $request
     * @return response
     */
    public function delete(Request $request)
    {
        try {
            $modelId = $request->segment(3);
            $model = $this->model->findOrFail($modelId);
            $response = $model->delete();
            return $response;
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
