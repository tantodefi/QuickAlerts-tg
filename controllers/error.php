<?php

class Errorfound extends Controller
{

  function __construct()
  {
    parent::__construct();
  }

  function index()
  {
    $this->view->title = '404!';
    $this->view->render('error/index');
  }

}