<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Config, Str, Image, Hash;
use App\User;
use App\Mail\MessageReceived;
use App\Proyect;

class UserController extends Controller
{

    public function __Construct()
    {
        $this->middleware('auth');
    }

}
