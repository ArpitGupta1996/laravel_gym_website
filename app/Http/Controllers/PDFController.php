<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PDFController extends Controller
{
    public function index(){
        $data['email'] = "arpitgupta19aug1996@gmail.com";
        $data['title'] = "Sample Mail with PDF";
        $data['body'] = "Hi, user, This is sample";

        $pdf->loadView('emails.myTestMail', $data);
        // $pdf = PDF::loadView('emails.myTestMail', $data);


        Mail::send('emails.myTestMail', $data, function($message) use($data, $pdf){
            $message->to($data['email'], $data['email'])
                        ->subject($data['title'])
                        ->attachData($pdf->output(), "text.pdf");
        });

        dd('Mail sent successfully');
    }
}
