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
                  <div data-i18n="Vertical Form">Thêm Giảng Viên</div>
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
                  <div data-i18n="Vertical Form">Thêm Học Sinh / Sinh Viên</div>
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
                <a href=" {{route('admin.addNewDepartment')}}" class="menu-link">
                 
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
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Searchcss/admin."
                  aria-label="Searchcss/admin." />
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
                            <img src=" {{asset('css/admin/minion_avt.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">Minionn</span>
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
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          

          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <!-- Total Revenue -->
              <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4" style="background-color: #f85a11;color:#fff;font-size:30px">
                <caption>Dang cap nhat</caption>
              </div>
              <!--/ Total Revenue -->
              <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                <div class="row">
                  <div class="col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <img src=" {{asset('css/admin/assets/img/icons/unicons/cc-primary.png')}}" alt="Credit Card" class="rounded" />
                          </div>
                          <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                              <a class="dropdown-item" href="javascript:void(0);">View More</a>
                              <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                          </div>
                        </div>
                        <span class="d-block mb-1">Khoa Viện</span>
                        <h3 class="card-title text-nowrap mb-2">{{$countUserDepartment}}</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <img src=" {{asset('css/admin/assets/img/icons/unicons/cc-primary.png')}}" alt="Credit Card" class="rounded" />
                          </div>
                          <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="cardOpt1">
                              <a class="dropdown-item" href="javascript:void(0);">View More</a>
                              <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                          </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Lớp Học</span>
                        <h3 class="card-title mb-2">{{$countUserClassroom}}</h3>
                      </div>
                    </div>
                  </div>
                </div><div class="row">
                  <div class="col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <img src=" {{asset('css/admin/assets/img/icons/unicons/cc-primary.png')}}" alt="Credit Card" class="rounded" />
                          </div>
                          <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                              <a class="dropdown-item" href="javascript:void(0);">View More</a>
                              <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                          </div>
                        </div>
                        <span class="d-block mb-1">Học Sinh</span>
                        <h3 class="card-title text-nowrap mb-2">{{$countUserstudent}}</h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <img src=" {{asset('css/admin/assets/img/icons/unicons/cc-primary.png')}}" alt="Credit Card" class="rounded" />
                          </div>
                          <div class="dropdown">
                            <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                              aria-haspopup="true" aria-expanded="false">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="cardOpt1">
                              <a class="dropdown-item" href="javascript:void(0);">View More</a>
                              <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                            </div>
                          </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Giáo Viên/ Giảng viên</span>
                        <h3 class="card-title mb-2">{{$countUserTeacher}}</h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- / Content -->



          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->
  <script>
    // Ẩn thông báo sau 3 giây
    setTimeout(function(){
        $('#success-alert').fadeOut('slow');
    }, 3000);
</script>
<!--===============================================================================================-->
<script src="{{asset('css/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('css/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('css/login/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('css/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('css/login/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('css/login/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('css/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('css/login/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('css/login/js/main.js')}}"></script>


  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src=" {{asset('css/admin/assets/vendor/libs/jquery/jquery.js')}}"></>
  <script src=" {{asset('css/admin/assets/vendor/libs/popper/popper.js')}}"></script>
  <script src=" {{asset('css/admin/assets/vendor/js/bootstrap.js')}}"></script>
  <script src=" {{asset('css/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

  <script src=" {{asset('css/admin/assets/vendor/js/menu.js')}}"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src=" {{asset('css/admin/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

  <!-- Main JS -->
  <script src=" {{asset('css/admin/assets/js/main.js')}}"></script>

  <!-- Page JS -->
  <script src=" {{asset('css/admin/assets/js/dashboards-analytics.js')}}"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>
