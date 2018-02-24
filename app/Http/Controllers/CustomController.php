<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Transformer\Transform;

class CustomController extends Controller
{
    protected $transform;

    public function __construct()
    {
        $this->transform = new Transform();
    }
}
