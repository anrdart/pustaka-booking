<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class latihan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }

    function index()
    {
        echo "Saya sedang belajar Web Programming II di kelas 12.3A.35";
    }

}