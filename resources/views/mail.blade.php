<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin Người Nhận</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 300px;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .recipient-info {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #f9f9f9;
    }

    .recipient-info p {
        margin: 0;
        padding: 5px 0;
    }

    .recipient-info strong {
        margin-right: 5px;
    }
</style>

<body>
<div class="container">
    <h2>{{ $subject }}</h2>
    <div class="recipient-info">
        <p><strong>Tôi là {{ $name }}</strong></p>
        <p><strong> {{ $contents }}</strong></p>
    </div>
</div>
</body>

</html>
