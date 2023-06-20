<!DOCTYPE html>
<html>
    {{-- <link rel="stylesheet" href="{{ asset('css/all.css') }}"> --}}

<head>
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form#change-password-form {
    padding: 20px;
}

        .form-container {
            max-width: 400px;
            margin: 300px auto;
            padding: 20px;
            background-color: #f7f7f7;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            /* font-weight: bold; */
            margin-bottom: 5px;
        }

        .form-group input[type="password"] {
    width: 100%;
    outline: none;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

        .form-group button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    @if (session('warning'))
    <div id="warning-alert" class="alert alert-warning">
        {{ session('warning') }}
    @endif
    <div class="form-container">
        <a href="javascript:void(0);" onclick="history.back();">Quay lại trang trước</a>

        <form id="change-password-form" action="{{route('hust.postchangePasswordStudent',['studentId' => $studentId])}}" method="post">
            @csrf
            <div class="form-group">
                <label for="current-password">Mật khẩu cũ:</label>
                <input type="password" id="current-password" name="current_password" required>
            </div>

            <div class="form-group">
                <label for="new-password">Mật khẩu mới:</label>
                <input type="password" id="new-password" name="new_password" required>
            </div>

            <div class="form-group">
                <label for="confirm-password">Nhập lại mật khẩu:</label>
                <input type="password" id="confirm-password" name="confirm_password" required>
            </div>

            <div class="form-group">
                <button type="submit">Đổi mật khẩu</button>
            </div>
        </form>
    </div>
</body>
</html>
