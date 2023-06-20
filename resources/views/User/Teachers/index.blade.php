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
{{-- <link rel="stylesheet" href="{{ asset('css/all.css') }}"> --}}
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
    <h1 class="line">Thông Tin cá nhân</h1>
    <div class="main_content">
      {{-- {{dd($Get_detail, $student)}} --}}
      <h2 class="line">Thông tin giảng viên </h2>
      <div class="info_student">
        <img src="{{asset($Get_detail->avatar)}}" alt="" class="avatar">
        <div class="content">
          <div class="content_col_1">
            
                
             
            <div class="row-5">
            <label for="name">Họ và Tên :</label>
            <p class="text" name="name">{{$teacher->Full_name}}</p>
          </div>
            <div class="row-5">
            <label for="year">Năm Vào Trường :</label>
            <p class="text" name="year">{{$Get_detail->year}}</p>
          </div>
            <div class="row-5">
            <label for="level">Bậc đào tạo :</label>
            <p class="text" name="level">{{$Get_detail->level}}</p>
          </div>
            <div class="row-5">
            <label for="ct">Chương trình :</label>
            <p class="text" name="ct">{{$Get_detail->chuongtrinh}}</p>
          </div>
        </div>
          <div class="content_col_2">
            <div class="row-5">
              <label for="Gender">Giới tính :</label>
              @if ($teacher->Gender == 1)
              <p class="text" name="Gender">Nam</p>
            @elseif ($teacher->Gender == 0)
            <p class="text" name="Gender">Nữ</p>
            @endif
            </div>
            <div class="row-5">
              <label for="khoa">Khóa học :</label>
              <p class="text" name="khoa">{{$Get_detail->nation}}</p>
            </div>
            <div class="row-5">
              <label for="email">Email :</label>
              <p class="text" name="email">{{$teacher->Email}}</p>
            </div>
          </div>
        </div>
      </div>
      <h2 class="line">Thông tin Cá nhân</h2>
      <div class="another_info">
        <div class="content_col_1_family">
          <div class="row-5">
          <label for="dantoc">Dân tộc : </label>
          <p class="text" name="dantoc">KINH</p>
        </div>
          <div class="row-5">
          <label for="year">Năm TN cấp 3 :</label>
          <p class="text" name="year">{{$Get_detail->highschoolgra}}</p>
        </div>
          <div class="row-5">
          <label for="level">Địa chỉ :</label>
          <p class="text" name="level">{{$teacher->Address}}</p>
        </div>
          <div class="row-5">
          <label for="ct">Số CMND :</label>
          <p class="text" name="ct">{{$Get_detail->CMND}}</p>
        </div>
          <div class="row-5">
          <label for="spec">Nơi cấp :</label>
          <p class="text" name="spec">{{$Get_detail->Noicap}}</p>
        </div>
        <div class="row-5">
          <label for="Gender">Họ tên bố :</label>
          <p class="text" name="Gender">{{$Get_detail->fathername}}</p>
        </div>
        <div class="row-5">
          <label for="class">Năm sinh :</label>
          <p class="text" name="class">{{$Get_detail->fatherbirth}}</p>
        </div>
        <div class="row-5">
          <label for="khoa">Nghề nghiệp :</label>
          <p class="text" name="khoa">{{$Get_detail->fatherjob}}</p>
        </div>
        <div class="row-5">
          <label for="email">Điện thoại :</label>
          <p class="text" name="email">{{$Get_detail->fatherphone}}</p>
        </div>
      </div>
        <div class="content_col_1_family">
          <div class="row-5">
            <label for="Gender">Tôn giáo :</label>
            <p class="text" name="Gender"> KHÔNG</p>
          </div>
          <div class="row-5">
            <label for="class">Trường THPT :</label>
            <p class="text" name="class">{{$Get_detail->highschool}}</p>
          </div>
          <div class="row-5">
            <label for="khoa">Hộ khẩu :</label>
            <p class="text" name="khoa">{{$Get_detail->household}}</p>
          </div>
          <div class="row-5">
            <label for="email">Số Điện thoại :</label>
            <p class="text" name="email">{{$teacher->Phone_number}}</p>
          </div>
          <div class="row-5">
            <label for="Gender">Họ tên mẹ :</label>
            <p class="text" name="Gender">{{$Get_detail->mothername}}</p>
          </div>
          <div class="row-5">
            <label for="class">Năm sinh :</label>
            <p class="text" name="class">{{$Get_detail->motherbirth}}</p>
          </div>
          <div class="row-5">
            <label for="khoa">Nghề nghiệp :</label>
            <p class="text" name="khoa">{{$Get_detail->motherjob}}</p>

          </div>
          <div class="row-5">
            <label for="email">Điện thoại :</label>
            @if ($Get_detail->motherphone = 'null')
            <p class="text" name="khoa">khong co</p>
          @else
          <p class="text" name="khoa">{{$Get_detail->motherphone}}</p>
          @endif
          </div>
        </div>
      </div>
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
