<?php
namespace In3050Inm428WebDev\PhpMvc\Controllers;

use In3050Inm428WebDev\PhpMvc\Controller;

class ReviewsController extends Controller
{
    public function index()
    {

        $data["pagetitle"] = "Reviews | Lancaster's Resturant";

        $this->render('pages/reviews/reviews', $data);
    }
}