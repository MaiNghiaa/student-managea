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

              
              <!-- /Logo -->
              <form id="formAuthentication" class="mb-3" action="{{route('updateTuition',$hocphi->id)}}" method="post">
                @csrf
        @method('PUT')
        <caption>Sửa Học Phí ư Thôi được rồi tôi đồng ý </caption>
                <div class="mb-3">
                  <label for="name" class="form-label">name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{$hocphi->name}}"/>
                </div>
                <div class="mb-3">
                  <label for="price" class="form-label">price</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="Enter your price" autofocus required 
                  value="{{$hocphi->price}}"/>
                </div>
                <div class="mb-3">
                  <label for="status" class="form-label">Gender</label>
                  <div></div>
                  <select id="Gender" name="status" required>
                    <option value="0" {{ $hocphi->status == 0 ? 'selected' : '' }}>Hết hạn</option>
                    <option value="1" {{ $hocphi->status == 1 ? 'selected' : '' }}>Còn</option>
                  </select>
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

                 