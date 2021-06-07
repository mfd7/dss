<?php namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home/index');
    }

    public function create()
    {
        return redirect()->to('/create');
    }

    public function kesebelasan()
    {
        return redirect()->to('/kesebelasan');
    }

    //--------------------------------------------------------------------
}
