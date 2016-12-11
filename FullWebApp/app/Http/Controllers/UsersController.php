<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\UsersModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
    
        //GET ALL USERS
        $filter = \DataFilter::source(new UsersModel);
        //SEARCH FILTER
        $filter->text('src', 'Find')->scope('freeSearch');
        $filter->build();

        $grid = \DataGrid::source($filter);

        //PAINT EVEN ROWS
        $grid->attributes(array("class" => "table table-striped"));
        //CREATE TABLE TO DISPLAY IN VIEW
        $grid->add('id', 'ID', true)->style("width:100px");
        $grid->add('name', 'Name', true);
        $grid->add('email', 'Email', true);
        //DEFINE ORDER TYPE
        $grid->orderBy('id', 'asc');
        //NUMBER OF ROWS PER PAGE
        $grid->paginate(10);

        //RETURN TO VIEW
        return view('users.list', compact('grid', 'filter'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //VIEW THAT DISPLAY ADD USERS FORM
        return view('users.add');
    }

    public function store(Request $request) {
        //RULES VALIDATION
        $rules = array('name' => 'unique:users|required|max:255',
            'email' => 'unique:users|required|email');
//      VALIDATION PARAMETERS
        $params = array("name" => $request->name,
            "email" => $request->email);
//      VALIDATION OF PARAMETERES
        $validator = Validator::make($params, $rules);
//      IF VALIDATION FAILS IS RETUNED AN ERROR
        if ($validator->fails()) {
            return redirect('/add')
                            ->withErrors($validator)
                            ->withInput();
        }
        //ELSE AN USER IS CREATED IN DB
        $user = new UsersModel();
        $user->name = $request->name;
        $user->email = $request->email;
        $saved = $user->save();

        if ($saved) {
            return redirect('/add')->with('message', 'User created');
        } else {
            return redirect('/add')->with('error', 'Cannot create user');
        }
    }

}
