<?php

namespace Novatree\Rest\Controllers;

use App\Http\Controllers\Controller;
use Novatree\Rest\Facades\RestFacade as Rest;
use Illuminate\Http\Request;

class RestModelController extends Controller
{
    /**
     * The application's Constructor that initializes the model name from url.
     * Then it will create a model of it (the model should be inside the  App directory).
     * Then it will call the useModel method of RestModel Service using Rest Facade.
     *
     *
     * It is surrounded with try catch block. If the model is not found in App\ directory
     * an exception will be thrown.
     *
     * @Facade Rest
     */
    public function __construct()
    {
        try {
            $modelName = ucfirst(Request()->segment(2));
            $modelName = 'App\\' . $modelName;
            $model = new $modelName();
            Rest::useModel($model);
        } catch (\Exception $e) {
            $e->getMessage();
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
     *
     * Returns Json String
     */
    public function all()
    {
        $val = Rest::getAll();

        return $val;
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
        $response = Rest::createRecord($request);

        return $response;
    }

    /**
     * Display the specified resource.
     *
     *  This will fetch a result of that model uses the Table/Schema with id(Primary Key).
     * It uses Rest Facades showById method to get the result.
     *
     *
     * @param  Request $request
     * Returns Json String
     */
    public function show(Request $request)
    {
        $record = Rest::showById($request);

        return $record;
    }

    /**
     * Update the specified resource in storage.
     *
     *  This will update a record of that model uses the Table/Schema with id(Primary Key)
     *  given as a parameter. It uses Rest Facade's updateRecord to operate.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * Returns Json String
     */
    public function update(Request $request)
    {
        $response =Rest::updateRecord($request);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     *  This will delete a record of that model uses the Table/Schema with id(Primary Key)
     *  given as a parameter. It uses Rest Facade's deleteRecord to operate.
     *
     * @param  Request $request
     * @return string
     */
    public function delete(Request $request)
    {
        $response = Rest::deleteRecord($request);

        return $response;
    }
}
