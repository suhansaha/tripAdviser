<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Roles;
use App\User;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($tableName)
    {
        $table = ucfirst($tableName);
        $dbTable =  'App\\'.$table;

        if (class_exists($dbTable)) {
            $tableData = $dbTable::all();
            $dbModel = new $dbTable;
            $fillables = $dbModel->getFillable();
            return view('backend.crude',["table" => $tableData,"tableName"=>$tableName,"fillables"=>$fillables]);
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($page)
    {
        return $this->index($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $form = $request->all();
        $tableName = "App\\".$request->tableName;

        $item = new $tableName;
        foreach($form as $field=>$value){
            if($item->isFillable($field)) {
                if($field == 'password')
                    $item->$field = bcrypt($value);
                else
                    $item->$field = $value;
            }
        }
        $item->save();

        try{
            //$item->save();
        }catch(\Illuminate\Database\QueryException $e){

        }

        return  $this->index($request->tableName);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($table,$id)
    {
        if($table == 'user' || $table == 'roles') {
            $tableClass = "\\App\\" . ucfirst($table);
        }else{
            $tableClass = "\\App\\" . $table;
        }
        return $tableClass::find($id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function showField($table,$id,$field,$fieldField="")
    {
        if($table == 'user' || $table == 'roles') {
            $tableClass = "\\App\\" . ucfirst($table);
        }else{
            $tableClass = "\\App\\" . $table;
        }

        $fields = $tableClass::find($id)->$field;
        if( $fieldField == "")
            return $fields;
        else {
            $arr = [];
            foreach( $fields as $field1){
                $arr[] = $field1->$fieldField;
            }
            return $arr;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
