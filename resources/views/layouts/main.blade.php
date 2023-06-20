<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img_header/logo-dhbk-1-02_130_191.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header/style.css') }}">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <title>{{ config('app.name', 'Hust') }}</title>
    <title>Hust</title>
</head>

<body>
    <nav class="header">
        <div class="top-header-wrapper">
            <div class="top-header">
                <div class="top-header-logo">
                    <a href=""><img src="{{ asset('img_header/logo-dhbk-1-02_130_191.png')}}" alt="" class="top-header-logo_img"></a>
                    <a href="">
                        <p class="top-header-heading">Đai Hoc Bach Khoa Ha Noi</p>
                        <p class="top-header-sub-heading">HANOI UNIVERSITY OF SCIENCE AND TECHNOLOGY </p>
                    </a>
                </div>
                <div class="top-header-actions">
                  </div>
                  
            </div>
        </div>
    </nav>
    @yield('content');
</body>

</html>