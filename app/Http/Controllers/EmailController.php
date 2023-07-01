<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Mail\TestingSendEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        Mail::to('testing@gmail.com')->send(new TestingSendEmail());
    }
}
