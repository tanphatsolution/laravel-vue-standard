<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\UserRepository;

class UserController extends Controller
{
    public function index()
    {
    	dd(app(UserRepository::class)->all());
    }
}
