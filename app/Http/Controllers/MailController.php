<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Mail;

class MailController extends Controller
{
    //
	public function send()
	{
		$name = 'youlv';
		$flag = Mail::send('emails.test',['name'=>$name],function($message)
		{
			$to = 'youlv@foxmail.com';
			$message->to($to)->subject('测试邮件');
		});
		if($flag)
		{
			echo '发送邮件成功';
		}else{
			echo '发送邮件失败';
		}
	}
}
