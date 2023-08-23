<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $title }}</title>
<script src="https://www.youtube.com/iframe_api"></script>
<link rel="shortcut icon" href="temp/images/logo 2.png" type="image/x-icon">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="/temp/admin/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="/temp/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="/temp/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="/temp/admin/plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/temp/admin/dist/css/adminlte.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="/temp/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="/temp/admin/plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="/temp/admin/plugins/summernote/summernote-bs4.min.css">
<script src="/ckeditor/ckeditor.js"></script>
<style>
    .image-container {
        position: relative;
        display: inline-block;
        margin: 10px;
    }

    .delete-button {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: red;
        color: white;
        border: none;
        width: 20px;
        display: flex;
        height: 20px;
        border-radius: 50%;
        align-items: center;
    }
    #cke_1_contents{
        height: 500px !important;
    }
    .text-black{
        color: black !important;
    }
    /* Định dạng cho label bao bọc checkbox */
    .checkbox-container {
        display: flex;
        align-items: center;
    }

    /* Ẩn checkbox thật */
    .checkbox-container input[type="checkbox"] {
        display: none;
    }

    /* Thiết lập kích thước và kiểu của checkbox tùy thuộc vào trạng thái */
    .checkbox-container .custom-checkbox {
        width: 18px;
        height: 18px;
        border: 2px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
        margin-right: 8px;
        cursor: pointer;
    }

    /* Đổi màu nền khi checkbox được chọn */
    .checkbox-container input[type="checkbox"]:checked + .custom-checkbox {
        background-color: greenyellow;
        border-color: greenyellow;
    }

    /* Đổi màu nền khi checkbox bị vô hiệu hóa */
    .checkbox-container input[type="checkbox"]:disabled + .custom-checkbox {
        background-color: #f8f9fa;
        border-color: #ccc;
        cursor: not-allowed;
    }

</style>
