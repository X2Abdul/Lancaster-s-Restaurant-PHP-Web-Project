<?php

namespace In3050Inm428WebDev\PhpMvc\Controllers;

use In3050Inm428WebDev\PhpMvc\Controller;

class MenuController extends Controller
{
    public function index()
    {

        $data["pagetitle"] = "Menu | Lancaster's Resturant";

        $this->render('pages/menu/menu', $data);
    }
}