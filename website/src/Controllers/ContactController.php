<?php

namespace In3050Inm428WebDev\PhpMvc\Controllers;

use In3050Inm428WebDev\PhpMvc\Controller;

class ContactController extends Controller
{
    public function index()
    {

        $data["pagetitle"] = "Contact | Lancaster's Resturant";

        $this->render('pages/contact/contact', $data);
    }
}