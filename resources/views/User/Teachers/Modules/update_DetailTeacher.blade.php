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
    {{-- <link rel="stylesheet" href="{{ asset('css/all.css') }}"> --}}

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
    .back {
        transform: translateY(10px);
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
            <div class="back"><a style="margin-top:15px;" href="javascript:void(0);" onclick="history.back();">Quay lại trang trước</a>
            </div>
        <h2 class="line">Sửa thông tin</h2>
        <div class="main_content">
            <form id="student-form" method="post"  enctype="multipart/form-data" action="{{route('user.post_Update_Teacher_detail',compact('teacherId'))}}">
            @csrf
            {{-- {{dd($teacherfamily)}} --}}
                <div class="form-group">
                    <label for="year">Năm Vào Trường:</label>
                    <input placeholder="VD : 2023" type="number" id="year" name="year" value="{{$teacherfamily->year}}">
                </div>
                <div class="form-group">
                    <label for="level"> Bậc đào tạo:</label>
                    <input placeholder="VD : Đại Học.." type="text" id="level" name="level" value="{{$teacherfamily->level}}">
                </div>

                <div class="form-group">
                    <label for="chuongtrinh">Chương trình:</label>
                    <input placeholder="VD : Cấp Cao..." type="text" id="chuongtrinh" name="chuongtrinh" value="{{$teacherfamily->chuongtrinh}}">
                </div>

                <div class="form-group">
                    <label for="highschool">Trường THPT :</label>
                    <input placeholder="VD : Hồng Bàng - Hải Phòng" type="text" id="highschool" name="highschool" value="{{$teacherfamily->highschool}}">
                </div>
                <div class="form-group">
                    <label for="Nation">Khóa :</label>
                    <input placeholder=" VD : 66" type="number" id="Nation" name="Nation" value="{{$teacherfamily->nation}}">
                </div>

                <div class="form-group">
                    <label for="highschoolgra">Năm Tốt nghiệp cấp 3:</label>
                    <input placeholder="VD : 2019" type="text" id="highschoolgra" name="highschoolgra" value="{{$teacherfamily->highschoolgra}}">
                </div>

                <div class="form-group">
                    <label for="CMND">Số CMND:</label>
                    <input placeholder="VD : 098213475647" type="text" id="CMND" name="CMND" value="{{$teacherfamily->CMND}}">
                </div>

                <div class="form-group">
                    <label for="noicap">Nơi cấp CMND:</label>
                    <input placeholder=" VD : Hải Phòng" type="text" id="noicap" name="noicap" value="{{$teacherfamily->Noicap}}">
                </div>

                <div class="form-group">
                    <label for="fathername">Họ tên cha:</label>
                    <input placeholder=" VD : Mai Văn A" type="text" id="fathername" name="fathername" value="{{$teacherfamily->fathername}}">
                </div>

                <div class="form-group">
                    <label for="fatherbirth">Năm sinh cha:</label>
                    <input placeholder="VD : 1963" type="number" id="fatherbirth" name="fatherbirth" value="{{$teacherfamily->fatherbirth}}">
                </div>

                <div class="form-group">
                    <label for="fatherjob">Nghề nghiệp cha:</label>
                    <input placeholder="VD : Tổng thống" type="text" id="fatherjob" name="fatherjob" value="{{$teacherfamily->fatherjob}}">
                </div>

                <div class="form-group">
                    <label for="fatherphone">Số điện thoại cha:</label>
                    <input placeholder="VD : 0987654321" type="text" id="fatherphone" name="fatherphone" value="{{$teacherfamily->fatherphone}}">
                </div>

                <div class="form-group">
                    <label for="mothername">Họ tên mẹ:</label>
                    <input placeholder="VD : .." type="text" id="mothername" name="mothername" value="{{$teacherfamily->mothername}}">
                </div>

                <div class="form-group">
                    <label for="motherbirth">Năm sinh mẹ:</label>
                    <input placeholder="" type="number" id="motherbirth" name="motherbirth" value="{{$teacherfamily->motherbirth}}">
                </div>

                <div class="form-group">
                    <label for="motherjob">Nghề nghiệp mẹ:</label>
                    <input placeholder="" type="text" id="motherjob" name="motherjob" value="{{$teacherfamily->motherjob}}">
                </div>

                <div class="form-group">
                    <label for="motherphone">Số điện thoại mẹ:</label>
                    <input placeholder="" type="number" id="motherphone" name="motherphone" value="{{$teacherfamily->motherphone}}">
                </div>

                <div class="form-group">
                    <label for="household">Hộ khẩu thường trú:</label>
                    <input id="household" name="household" value="{{$teacherfamily->household}}">
                </div>
                <label for="avatar">thêm tấm ảnh cho đẹp trai</label>
                <input placeholder="" type="file" name="avatar">
                <div class="form-group">
                    <button type="submit">Gửi</button>
                </div>
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
        