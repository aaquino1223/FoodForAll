<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostType;
use App\ViewRestrictionType;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ViewRestrictionTypes = ViewRestrictionType::orderBy('ViewRestrictionTypeId', 'DESC')->get();
        return $ViewRestrictionTypes->toJson();
    }
}
