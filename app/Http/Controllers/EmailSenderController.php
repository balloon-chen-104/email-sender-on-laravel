<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailSender;

require_once '../resources/session_helper.php';

class EmailSenderController extends Controller
{
    public function form()
    {
        $data = [
            'name' => '',
            'sendTo' => '',
            'title' => '',
            'body' => '',
            'name_error' => '',
            'sendTo_error' => '',
            'title_error' => '',
            'body_error' => ''
        ];

        return view('emailSend', ['data' => $data]);
    }

    public function send()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'name' => trim($_POST['name']),
            'sendTo' => trim($_POST['sendTo']),
            'title' => trim($_POST['title']),
            'body' => trim($_POST['body']),
            'name_error' => '',
            'sendTo_error' => '',
            'title_error' => '',
            'body_error' => ''
        ];

        // Validate data
        if(empty($data['name'])){
            $data['name_error'] = 'Please enter name';
        }
        if(empty($data['sendTo'])){
            $data['sendTo_error'] = 'Please enter sendTo';
        }
        if(empty($data['title'])){
            $data['title_error'] = 'Please enter Title';
        }
        if(empty($data['body'])){
            $data['body_error'] = 'Please enter Body';
        }
        if (!filter_var($data['sendTo'], FILTER_VALIDATE_EMAIL)) {
            $data['sendTo_error'] = 'This email is invalid';
        }

        // Make sure no errors
        if(empty($data['name_error']) && empty($data['sendTo_error']) && empty($data['title_error']) && empty($data['body_error'])){
            
            // 收件者務必使用 collect 指定二維陣列，每個項目務必包含 "name", "email"
            $to = collect(
                [[
                    'name' => $data['name'],
                    'email' => $data['sendTo']
                ]]
            );
    
            // 提供給模板的參數
            $email = [
                'title' => $data['title'],
                'body' => $data['body']
            ];

            Mail::to($to)->send(new EmailSender($email));

            flash('email_message', 'Email Sended');

            return redirect('/email')->with(['data' => $data]);
        } else{
            return view('emailSend', ['data' => $data]);
        }   
    }
}
