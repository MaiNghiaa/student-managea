  {{--  --}}
  <!DOCTYPE html>

  <html
    lang="en"
    class="light-style customizer-hide"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="{{asset('css/admin/assets/')}}"
    data-template="vertical-menu-template-free"
  >
    <head>
      <meta charset="utf-8" />
      <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
      />

      <title>Login Basic - Pages | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

      <meta name="description" content="" />

      <!-- Favicon -->
      <link rel="icon" type="image/x-icon" href="{{asset('css/admin/assets/img/favicon/favicon.ico')}}" />
      <link rel="stylesheet" href="{{ asset('css/all.css') }}">

      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
      />

      <!-- Icons. Uncomment required icon fonts -->
      <link rel="stylesheet" href="{{asset('css/admin/assets/vendor/fonts/boxicons.css')}}" />

      <!-- Core CSS -->
      <link rel="stylesheet" href="{{asset('css/admin/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
      <link rel="stylesheet" href="{{asset('css/admin/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
      <link rel="stylesheet" href="{{asset('css/admin/assets/css/demo.css')}}" />

      <!-- Vendors CSS -->
      <link rel="stylesheet" href="{{asset('css/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

      <!-- Page CSS -->
      <!-- Page -->
      <link rel="stylesheet" href="{{asset('css/admin/assets/vendor/css/pages/page-auth.css')}}" />
      <!-- Helpers -->
      <script src="{{asset('css/admin/assets/vendor/js/helpers.js')}}"></script>

      <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
      <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
      <script src="{{asset('css/admin/assets/js/config.js')}}"></script>
    </head>

    <body>
      <!-- Content -->
  <style>
    select#specialized {
      display: flex;
      width: 300px;
      width: 100%;
      outline: none;
      padding: 8px 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
  }
    select#role {
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      color: #b9b7b7;
      width: 100%;
  }
  select#Gender {
    border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      color: #b9b7b7;
      width: 100%;
  }
  </style>
      <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner">
            <!-- Register Card -->
            <div class="card">
              <div class="card-body">
                <!-- Logo -->
                <div class="app-brand justify-content-center">
                  <a href="index.html" class="app-brand-link gap-2">
                    <span class="app-brand-logo demo">
                      
                    </span>
                    <span class="app-brand-text demo text-body fw-bolder">Register</span>
                  </a>
                </div>
                
                <!-- /Logo -->
              @foreach ($teacher as $item)
                <form id="formAuthentication" class="mb-3" action="{{route('updateTeacher',$item->id)}}" method="post">
                  @csrf
          @method('PUT')
                  <div class="mb-3">
                    <label for="id" class="form-label">Id Name</label>
                    <input type="text" class="form-control" id="id" name="id" placeholder="Enter your id" value="{{$item->Teacher_id}}"/>
                  </div>
                  <div class="mb-3">
                    <label for="Full_name" class="form-label">Full_Name</label>
                    <input
                      type="text"
                      class="form-control"
                      id="Full_name"
                      name="Full_name"
                      placeholder="Enter your Full_name"
                      autofocus
                    required value="{{$item->Full_name}}"/>
                  </div>
                  <div class="mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" placeholder="Your Birthday" required value="{{$item->Date_of_birth}}"/>
                  </div>
                  <div class="mb-3">
                    <label for="Gender" class="form-label">Gender</label>
                    <div></div>
                    <select id="Gender" name="Gender" required>
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="Address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="Address" name="Address" placeholder="Enter your Address" required value="{{$item->Address}}"/>
                  </div>
                  <div class="mb-3">
                    <label for="Phone_number" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" id="Phone_number" name="Phone_number" placeholder="Enter your Phone_number" required value="{{$item->Phone_number}}"/>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" required value="{{$item->Email}}"/>
                  </div>
                  
                  <div class="mb-3">
                    <label for="role" class="form-label">Vai Trò</label>
                    <div></div>
                    <select id="role" name="role" required>
                      <option value="Teacher" readonly>Giảng Viên</option>       
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="specialized" class="form-label">specialized</label> <br />
                      @foreach ($classrooms as $classroom)
      <input type="checkbox" name="specialized[]" value="{{ $classroom->id }}" @if ($teachers_classrooms->contains('classroom_id', $classroom->id)) selected @endif>
          {{ $classroom->classroom }}
      <br />
  @endforeach
                  </div>
                  @endforeach
                  {{-- <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group input-group-merge">
                      <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                      required/> --}}
                      {{-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                  </div> --}}
                  <!-- File input -->
            
                  {{-- <div class="mb-3">
                    <label for="formFile" class="form-label">Ảnh đại Diện</label>
                    <input class="form-control" type="file" id="formFile" name="image"/>
                  </div> --}}

                  <div class="mb-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                      <label class="form-check-label" for="terms-conditions">
                        I agree to
                        <a href="javascript:void(0);">privacy policy & terms</a>
                      </label>
                    </div>
                  </div>
                  <button class="btn btn-primary d-grid w-100">Cập Nhật</button>
                </form>

              </div>
            </div>
            <!-- Register Card -->
          </div>
        </div>
      </div>

      <!-- / Content -->

      <!-- Core JS -->
      <!-- build:js assets/vendor/js/core.js -->
      <script src="{{asset('css/admin/assets/vendor/libs/jquery/jquery.js')}}"></script>
      <script src="{{asset('css/admin/assets/vendor/libs/popper/popper.js')}}"></script>
      <script src="{{asset('css/admin/assets/vendor/js/bootstrap.js')}}"></script>
      <script src="{{asset('css/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

      <script src="{{asset('css/admin/assets/vendor/js/menu.js')}}"></script>
      <!-- endbuild -->

      <!-- Vendors JS -->

      <!-- Main JS -->
      <script src="{{asset('css/admin/assets/js/main.js')}}"></script>

      <!-- Page JS -->

      <!-- Place this tag in your head or just before your close body tag. -->
      <script async defer src="https://buttons.github.io/buttons.js"></script>
    </body>
  </html>

                  