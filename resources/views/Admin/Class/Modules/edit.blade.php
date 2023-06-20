
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
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">

    <title>Login Basic - Pages | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('css/admin/assets/img/favicon/favicon.ico')}}" />

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
  select#department {
    width: 100%;
    border: 1px solid #ccc;
    padding: 15px 10px;
    border-radius: 6px;
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
                  <span class="app-brand-text demo text-body fw-bolder">Register</span>
                </a>
              </div>
              
              
              <!-- /Logo -->
              @foreach ($Classroom as $Classroom)

              <form id="formAuthentication" class="mb-3" action="{{route('updateClassroom',$Classroom->id)}}" method="post">
                @csrf
        @method('PUT')
                {{-- {{dd($Classroom->id)}}; --}}
                <div class="mb-3">
                  <label for="id" class="form-label">Id Classroom</label>
                  <input type="number" class="form-control" id="classroom_id" name="classroom_id" placeholder="Enter your id" value="{{$Classroom->classroom_id}}"/>
                </div>
                <div class="mb-3">
                  <label for="Classroom" class="form-label">Classroom</label>
                  <input type="text" class="form-control" id="Classroom" name="Classroom" placeholder="Enter your Classroom" required value="{{$Classroom->classroom}}"/>
                </div>
                <div class="mb-3">
                  <label for="department" class="form-label">Department</label>
                  <div></div>
                  <select id="department" name="department" required>
                    @foreach ($Departments as $Department)
                    <option value="{{$Department->id}}">{{$Department->Department}}</option>
                    @endforeach   
                  </select>
                </div>
                <button class="btn btn-primary d-grid w-100">Cập Nhật</button>
              </form>
              @endforeach 

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

                 