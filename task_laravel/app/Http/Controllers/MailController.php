<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\emailMailler;
use App\Models\Post;
use App\Models\Comment;

class MailController extends Controller
{
    public function send()
    {
       
       Mail::to('muhammed9ragab@gmail.com')->send(new emailMailler());

       return response('Done');
    }
}
