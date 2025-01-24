<?php

namespace In3050Inm428WebDev\PhpMvc\Controllers;

use In3050Inm428WebDev\PhpMvc\Controller;

class HomeController extends Controller
{
    public function index()
    {

        $data["pagetitle"] = "Home | Lancaster's Resturant";

        $this->render('index', $data);
    }
}