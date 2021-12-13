<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\DB;
use App\CustomClasses\ValidateData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use TCG\Voyager\Events\BreadDataAdded;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadDataRestored;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class ConvertCotactToUserController extends VoyagerBaseController
{
    public function store(Request $request){
        //show controller
        $id=$request->input('contact_id');

        //create user
        $contact_id=$id;
        User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'address'=>$request->input('address'),
            'phone'=>$request->input('phone'),
            'password'=>Hash::make($request->input('password')),
            'contact_id'=>$contact_id
        ]);
        return redirect()->back();
    }
}
