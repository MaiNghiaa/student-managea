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

    .profile-card {
        max-width: 400px;
        padding: 20px;
        background-color: #f1f1f1;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .profile-image {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 20px;
    }

    .profile-field {
        margin-bottom: 10px;
    }

    .profile-field label {
        font-weight: bold;
    }

    .profile-field span {
        margin-left: 5px;
    }
    .column_2 {
    display: flex;
    flex-direction: row;
    align-items: flex-start;
}

tr td {
    padding: 20px;
    border: 1px solid black;
    text-align: center;
    /* line-height: 20px; */
}
table{
    width: 100%;
    height: 300px;
}
th {
    text-align: center;
    padding-bottom: 20px;
}
h1 {
    font-size: 24px;
    color: #b13838;
    display: inline-block;
    margin-top: 30px;
    font-weight: 700;
    margin: 30px 42%;
}
.line::after{
  margin-top:15px;
  content: "";
  display:block;
  width: 100%;
  height: 2px;
  border:1px solid orange;

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
    padding: 0 50px 30px 20px;
    margin: 0 auto;
}
.info_student {
    display: flex;
    padding: 24px;
    gap: 120px;
    flex-direction: row;
    align-content: stretch;
    justify-content: flex-start;
    align-items: center;
}
.pagination {
    margin-top: 20px;
    justify-content: center;
}
.avatar{
  width: 250px;
  height: 250px;
  object-fit: cover;
}
.row-5 {
    display: flex;
    flex-direction: row;
    gap: 14px;
    margin-top: 8px;
}
.content {
    display: flex;
    width: 100%;
    flex-direction: row;
    flex-wrap: nowrap;
    align-content: center;
    justify-content: space-around;
    align-items: center;
    font-size: 16px;
}
label{
font-weight: 700;
}
.another_info {
    display: flex;
    flex-direction: row;
    gap: 250px;
    padding: 20px;
    align-content: center;
    justify-content: flex-start;
    align-items: center;
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
		@if (session('error'))
		<div id="error-alert" class="alert alert-error">
			{{ session('error') }}
		</div>
	@endif
    <h1 class="line">Thông tin Học Phần</h1>
    <a href="javascript:void(0);" onclick="history.back();">Quay lại trang trước</a>
    <div class="main_content">
      {{-- {{dd($Get_detail, $student)}} --}}
      <h2 class="line"> </h2>
      

      <table>
        <thead>
          <tr>
            <th>Chọn</th>
            <th>STT</th>
            <th>Mã Lớp</th>
            <th>Tên Lớp</th>
            <th>Khoa / Viện</th>
            <th>Thời Gian</th>
          </tr>
        </thead>
        <tbody>
          <form action="{{route('TeacherUser.Postdangkylophoc', $teacherId)}}" method="post">
            @csrf
          @foreach ($Classrooms as $Classroom)
          {{-- {{dd($Classroom->id)}} --}}
            <tr>
                <td><input type="checkbox" id="class" name="class[]" value="{{$Classroom->id}}"></td>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $Classroom->classroom_id }}</td>
                <td>{{ $Classroom->classroom}}</td>
                <td>@foreach ($Departments as $Department)
                  @if ($Classroom->department_id == $Department->id)
                    {{$Department->Department}}
                  @endif
                @endforeach</td>
                <td>{{ $Classroom->Day }}</td>    
            </tr>
          @endforeach
        </tbody>
      </table>
      <button type="submit" style="background-color: #b13838; color:#fff; padding:8px 12px;margin-top:20px">Đăng Ký</button>
    </form>
    </div>
  </div>
</div>
	
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
