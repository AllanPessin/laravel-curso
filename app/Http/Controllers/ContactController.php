<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact() {
      $title = 'Contato';
      return view('site.contact', compact('title'));
    }
}
