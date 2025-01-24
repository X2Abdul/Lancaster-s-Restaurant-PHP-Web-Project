<?php

namespace In3050Inm428WebDev\PhpMvc\Controllers;

use In3050Inm428WebDev\PhpMvc\Controller;

class GuestDashboardController extends Controller
{
    public function index()
    {
        // Start session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $data["pagetitle"] = "Guest | Lancaster's Resturant";
        $data["welcome"] = "Welcome Guest";


        $this->render('pages/guest/guest', $data);
    }
}