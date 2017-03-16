<?php

namespace Novatree\RestModel\Controllers;
use App\Http\Controllers\Controller;
use Novatree\RestModel\Facades\RestFacade as Rest;
use Illuminate\Http\Request;
class RestModelController extends Controller
{
 protected $restModelServices;
    public  function __construct()
            {
                try
                {
                $modelName ='App\\'.ucwords(Request()->segment(3));
                $model = new $modelName();
                Rest::useModel($model);
             }
            catch (\Exception $e){
                $e->getMessage();
            }

            }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $val =Rest::getAll();
        return $val;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $response = Rest::createRecord($request);
    return $response;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $record = Rest::showById();
        return $record;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Rest::updateRecord($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete()
    {
        $response =Rest::deleteRecord();
        return $response;
    }
}
