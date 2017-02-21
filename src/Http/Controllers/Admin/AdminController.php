<?php


namespace Nuntius\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function main()
    {
        return view('nuntius::admin.main');
    }
}