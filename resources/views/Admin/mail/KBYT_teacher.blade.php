
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path=""
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href=" {{asset('css/admin/assets/img/favicon/favicon.ico')}}" />
  <link rel="stylesheet" href="{{ asset('css/all.css') }}">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href=" {{asset('css/admin/assets/vendor/fonts/boxicons.css')}}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href=" {{asset('css/admin/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
  <link rel="stylesheet" href=" {{asset('css/admin/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href=" {{asset('css/admin/assets/css/demo.css')}}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href=" {{asset('css/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

  <link rel="stylesheet" href=" {{asset('css/admin/assets/vendor/libs/apex-charts/apex-charts.css')}}" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src=" {{asset('css/admin/assets/vendor/js/helpers.js')}}"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src=" {{asset('css/admin/assets/js/config.js')}}"></script>
</head>

<body>
  @php
  @endphp
  <style>
    .fullscreen-image {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .fullscreen-image img {
        max-width: 90%;
        max-height: 90%;
    }

    /* css phân trang */
    .pagination {
        margin-top: 20px;
        margin-bottom: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .pagination > * {
        margin: 0 10px;
    }

    .pagination .active {
        font-weight: bold;
    }

    
    .alert-success {
    /* background-color: #e8fadf;
    border-color: #d4f5c3;
    color: #71dd37; */
    margin: 20px 40px;
}
form.search-form {
    display: flex;
}
input.form-control.border-0.shadow-none {
    width: 500%;
    overflow: hidden;
}
button.btnSearch {
    border: none;
    padding: 15px;
    background-color: #fff;
    /* border-radius: 10px; */
}
    .container {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      margin-top: 20px;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
    }
    
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    
    .actions {
      display: flex;
    }
    
    .actions button {
      margin-right: 4px;
    }
  </style>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    {{-- <div class="layout-container"> --}}
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="{{route('admin.index')}}" class="app-brand-link">
            <span class="app-brand-logo demo">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Quản Lý Hust</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
          <li class="menu-item active">
            <a href="index.html" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages</span>
          </li>
         
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
              <div data-i18n="Authentications">Hòm thư</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <div data-i18n="Basic">Khai Báo Y Tế</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="{{route('admin.mail_khaibaoyte')}}" class="menu-link" target="_blank" style="margin-left:40px;" target="_self">
                      <div data-i18n="Basic">Học Sinh / Sinh viên</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="{{route('admin.mailteacher_khaibaoyte')}}" class="menu-link" target="_blank" style="margin-left:40px;" target="_self">
                      <div data-i18n="Basic">Giảng viên</div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="menu-item">
                <a href="{{route('admin.mail_HocPhi')}}" class="menu-link" target="_blank">
                  <div data-i18n="Basic">Tiền Học</div>
                </a>
              </li>
            </ul>
          </li>
          

          <!-- Accounts -->
          <li class="menu-header small text-uppercase"><span class="menu-header-text">Accounts</span></li>
          <!-- Account Teacher -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div data-i18n="Form Layouts">Giảng Viên</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('admin.InfoTeacher')}}" class="menu-link">
                  
                  <div data-i18n="Horizontal Form">Thông Tin</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('admin.addNewTeacher')}}" class="menu-link">
                  <div data-i18n="Vertical Form">Tạo Tài Khoản</div>
                </a>
              </li>
            </ul>
          </li>
          <!-- Account Student -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div data-i18n="Form Layouts">Sinh Viên</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('admin.InfoStudent')}}" class="menu-link">
                  <div data-i18n="Horizontal Form">Thông Tin</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('admin.addNewStudent')}}" class="menu-link">
                  <div data-i18n="Vertical Form">Tạo Tài Khoản</div>
                </a>
              </li>
            </ul>
          </li>
          <!-- Class room -->
          <li class="menu-header small text-uppercase"><span class="menu-header-text">Khoa / Viện</span></li>
          <!-- Department  -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div data-i18n="Form Layouts">Khoa / Viện</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('admin.InfoDepartment')}}" class="menu-link">
                  
                  <div data-i18n="Horizontal Form">Thông Tin</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('admin.addNewDepartment')}}" class="menu-link">
                  
                  <div data-i18n="Vertical Form">Thêm Khoa / Viện</div>
                </a>
              </li>
            </ul>
          </li>
          <!-- Class -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div data-i18n="Form Layouts">Lớp Học</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('admin.InfoClass')}}" class="menu-link">
                  
                  <div data-i18n="Horizontal Form">Thông Tin</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('admin.addNewClass')}}" class="menu-link">
                  <div data-i18n="Vertical Form">Thêm Lớp Học</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div data-i18n="Form Layouts">Học Phí</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('admin.tuition')}}" class="menu-link">
                  
                  <div data-i18n="Horizontal Form">Thông Tin</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('admin.addtuition')}}" class="menu-link">
                  
                  <div data-i18n="Vertical Form">Thêm Loại Học Phí</div>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <form class="search-form" method="GET">
                <button type="submit" class="btnSearch"><i class="bx bx-search fs-4 lh-0"></i></button>
                <input type="text" name="name" class="form-control border-0 shadow-none" placeholder="Searchcss/admin."
                  aria-label="Searchcss/admin." />
                </form>
              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Place this tag where you want the button to render. -->
              <li class="nav-item lh-1 me-3">
                <a class="github-button" href="https://github.com/themeselection/sneat-html-admin-template-free"
                  data-icon="octicon-star" data-size="large" data-show-count="true"
                  aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Star</a>
              </li>

              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src=" {{asset('css/admin/minion_avt.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src=" {{asset('css/admin/assets/img/avatars/1.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">John Doe</span>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>                  
                    <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span></a>
                </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->
        @if (session('success'))
    <div id="success-alert" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
  <div class="container">
    <table>
      <thead>
        <tr>
          <th>STT</th>
          <th>Tên</th>
          <th>Ảnh</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($Mail_BHYT as $teacherMall)
        {{-- {{dd($teacherMall)}} --}}
          <tr>
            <td>{{ $loop->iteration }}</td>
            @foreach ($teachers as $teachers)
            @if ($teacherMall->id == $teachers->id)
            <td>{{ $teachers->Full_name}}</td>
            @endif    
            @endforeach
            <td>
                <img src="{{ $teacherMall->img }}" alt="" style="min-width:100px;min-height:100px;max-width:300px;max-height:300px;object-fit:cover" class="fullscreen-trigger">
            </td>
            <td>
                <form action="{{route('updateteacher.status', ['teacherId' => $teacherMall->id])}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-xs btn-primary" style="margin-left:10px;padding:8px 15px" name="status" value="2" >Check</button>
                    <button type="submit" class="btn btn-xs btn-primary" style="margin-left:10px;padding:8px 15px" name="status" value="0" >Sai</button>
                </form>
            </td>
          </tr>
        @endforeach
      </tbody>

    </table>
    <div class="pagination">
      {{ $Mail_BHYT->links('pagination::bootstrap-4') }}
  </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        var images = document.querySelectorAll('.fullscreen-trigger');

        images.forEach(function (image) {
            image.addEventListener('click', function () {
                var imageUrl = this.getAttribute('src');

                var fullscreenContainer = document.createElement('div');
                fullscreenContainer.classList.add('fullscreen-image');

                var fullscreenImage = document.createElement('img');
                fullscreenImage.setAttribute('src', imageUrl);

                fullscreenContainer.appendChild(fullscreenImage);

                fullscreenContainer.addEventListener('click', function () {
                    fullscreenContainer.remove();
                });

                document.body.appendChild(fullscreenContainer);
            });
        });
    });
</script>
<!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src=" {{asset('css/admin/assets/vendor/libs/jquery/jquery.js')}}"></>
    <script src=" {{asset('css/admin/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src=" {{asset('css/admin/assets/vendor/js/bootstrap.js')}}"></script>
    <script src=" {{asset('css/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src=" {{asset('css/admin/assets/vendor/js/menu.js')}}"></script> 
    <script src=" {{asset('css/admin/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
    <script src=" {{asset('css/admin/assets/js/main.js')}}"></script>
    <script src=" {{asset('css/admin/assets/js/dashboards-analytics.js')}}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
