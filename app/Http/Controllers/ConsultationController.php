<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConsultationMail;

class ConsultationController extends Controller
{
    public function register(Request $request)
    {
// Lấy email từ input
        $email = $request->input('email');

// Gửi email đến quản trị
        Mail::to('haomrvuii@gmail.com')->send(new ConsultationMail($email, 'admin'));

// Gửi email xác nhận cho khách hàng
        Mail::to($email)->send(new ConsultationMail($email, 'customer'));

        return redirect()->back()->with('success', 'Đăng ký tư vấn thành công!');
    }
}
