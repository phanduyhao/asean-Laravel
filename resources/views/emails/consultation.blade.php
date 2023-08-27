<!DOCTYPE html>
<html>
<head>
    <title>{{ $recipientType === 'admin' ? 'New Consultation Request' : 'Consultation Registration Confirmation' }}</title>
</head>
<body>
<p>Xin chào,</p>
@if ($recipientType === 'admin')
    <p>Bạn nhận được một yêu cầu đăng ký tư vấn mới từ: {{ $email }}</p>
@else
    <p>Cảm ơn bạn đã đăng ký tư vấn. Chúng tôi sẽ liên hệ sớm nhất có thể.</p>
@endif
</body>
</html>
