@extends('layouts.main')
@section('content')
<link rel="icon" type="image/x-icon" href=" {{asset('css/admin/assets/img/favicon/favicon.ico')}}" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"rel="stylesheet" />
<link rel="stylesheet" href=" {{asset('css/admin/assets/vendor/fonts/boxicons.css')}}" />
<link rel="stylesheet" href=" {{asset('css/admin/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
<link rel="stylesheet" href=" {{asset('css/admin/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
<link rel="stylesheet" href=" {{asset('css/admin/assets/css/demo.css')}}" />
<link rel="stylesheet" href=" {{asset('css/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
<link rel="stylesheet" href=" {{asset('css/admin/assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<script src=" {{asset('css/admin/assets/vendor/js/helpers.js')}}"></script>
<script src=" {{asset('css/admin/assets/js/config.js')}}"></script>
  <link rel="icon" type="image/png" href="{{asset('css/login/images/icons/favicon.ico')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/login/vendor/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/login/vendor/animate/animate.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/login/vendor/css-hamburgers/hamburgers.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/login/vendor/animsition/css/animsition.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/login/vendor/select2/select2.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/login/vendor/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/login/css/util.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/login/css/main.css')}}">
    <style>
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    h2{
    font-size: 16px;
    color: #b13838;
    display: block;
    margin-top: 30px;
    font-weight: 700;
  margin-bottom:20px;
}
.limiter {
    width: 100%;
    margin: 0 auto;
    padding: 0px 40px;
}
textarea:focus, input:focus:focus{
    border:1px solid #ccc;
}

    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
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
    .column_2 {
    display: flex;
    flex-direction: row;
    align-items: flex-start;
    }
</style>
<!-- Menu -->
<div class="column_2">
  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="menu-inner-shadow"></div>

    <!-- Accounts -->
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Accounts</span></li>
    <!-- Account Teacher -->
    <li class="menu-item">

        <li class="menu-item">
          {{-- {{route('Teacher.changePasswordStudent', ['teacherId' => $teacherId])}} --}}
          <a href="{{route('Teacher.changePasswordTeacher', ['teacherId' => $teacherId])}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-detail"></i>
            <div data-i18n="Horizontal Form">Đổi Mật Khẩu</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{ route('user.logout') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-detail"></i>
            <div data-i18n="Vertical Form">Thoát Đăng Nhập</div>
          </a>
        </li>
      </li>
      <li class="menu-item">
        <a href="{{route('user.Teacher.khaibaoyte', ['teacherId' => $teacherId])}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div data-i18n="Vertical Form">Khai Báo Y Te</div>
        </a>
      </li>
    </li>
    </li>
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Giảng viên</span></li>
    <ul class="menu-inner py-1">
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">Hồ Sơ Giảng Viên</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            
            <a href="{{route('UserTeacher.index',['teacherId' => $teacherId])}}" class="menu-link">
              <div data-i18n="Account">Thông tin cá nhân</div>
            </a>
          </li>
        </ul>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('user.Update_Teacher_detail', ['teacherId' => $teacherId])}}" class="menu-link">
              <div data-i18n="Account">Sửa thông tin</div>
            </a>
          </li>
        </ul>
      </li>
      <!-- Đăng ký -->
      <li class="menu-header small text-uppercase"><span class="menu-header-text">Đăng Ký</span></li>
      <!-- Department  -->
      <li class="menu-item">
           <a href="{{route('TeacherUser.dangkylophoc', ['teacherId' => $teacherId])}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div data-i18n="Form Layouts">Đăng ký Lớp</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="{{route('user.TeacherClass', ['teacherId' => $teacherId])}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-detail"></i>
          <div data-i18n="Form Layouts">Lớp của tôi</div>
        </a>
      </li>
      <li class="menu-header small text-uppercase"><span class="menu-header-text">Tin tức</span></li>

      <li class="menu-item">
        <a href="https://hust.edu.vn/vi/news/" class="menu-link">
          <i class="menu-icon tf-icons bx bx-dock-top"></i>
          <div data-i18n="Account Settings">Trang tin tức</div>
        </a>
      </li>
    </ul>
  </aside>
  <!-- / Menu -->
      <div class="limiter">	
          @if (session('success'))
          <div id="success-alert" class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif
      
      <h2 class="line">Cập nhật Điểm</h2>
      <div class="main_content">
        <form id="student-form" method="post" enctype="multipart/form-data" action="{{ route('Teacher.UpdatePointStudent', ['teacherId' => $teacherId, 'classId' => $classId, 'student_id' => $bangdiem->student_id]) }}
            "
        >
          @csrf
            <div class="form-group">
                <label for="Name">Tên</label>
                <input type="text" id="Name" name="Name" value="{{$bangdiem->Full_name}}" readonly>
            </div>
            <div class="form-group">
                <label for="classroom">Lớp :</label>
                <input type="text"  value="{{$bangdiem->classroom}}" id="classroom" name="classroom" readonly>
            </div>

            <div class="form-group">
                <label for="diemquatrinh">Điểm Quá Trình :</label>
                <input type="text"  value="{{$bangdiem->diemquatrinh}}" id="diemquatrinh" name="diemquatrinh">
            </div>
            <div class="form-group">
                <label for="Gk">Giữa kì :</label>
                <input type="text"  value="{{$bangdiem->Gk}}" id="Gk" name="Gk">
            </div>
            <div class="form-group">
                <label for="Ck">Cuối Kì :</label>
                <input type="text"  value="{{$bangdiem->ck}}" id="Ck" name="Ck">
            </div>
            <button type="submit" style="padding:8px 12px; color:#fff; background-color:#b13838">Cập Nhật</button>
        </form>
    </div>
    </div>
  </div>
  <script>
    function extractYear() {
        var dateInput = document.getElementById('year');
        var yearInput = document.getElementById('yearHidden');

        // Trích xuất năm từ giá trị ngày tháng
        var selectedDate = new Date(dateInput.value);
        var year = selectedDate.getFullYear();

        // Gán năm vào trường ẩn
        yearInput.value = year;
    }
</script>

    <script src=" {{asset('css/admin/assets/vendor/libs/jquery/jquery.js')}}">
        <script src=" {{asset('css/admin/assets/vendor/libs/popper/popper.js')}}"></script>
        <script src=" {{asset('css/admin/assets/vendor/js/bootstrap.js')}}"></script>
        <script src=" {{asset('css/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
        <script src=" {{asset('css/admin/assets/vendor/js/menu.js')}}"></script> 
        <script src=" {{asset('css/admin/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
        <script src=" {{asset('css/admin/assets/js/main.js')}}"></script>
        <script src=" {{asset('css/admin/assets/js/dashboards-analytics.js')}}"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
          <script src="{{asset('css/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
          <script src="{{asset('css/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
          <script src="{{asset('css/login/vendor/bootstrap/js/popper.js')}}"></script>
          <script src="{{asset('css/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
          <script src="{{asset('css/login/vendor/select2/select2.min.js')}}"></script>
          <script src="{{asset('css/login/vendor/daterangepicker/moment.min.js')}}"></script>
          <script src="{{asset('css/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
          <script src="{{asset('css/login/vendor/countdowntime/countdowntime.js')}}"></script>
          <script src="{{asset('css/login/js/main.js')}}"></script>
@endsection
      