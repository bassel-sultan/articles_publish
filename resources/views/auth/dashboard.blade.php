@extends('layouts.auth')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

@endsection
@section('content')




  <!-- ====================================
  ——— CONTENT WRAPPER
  ===================================== -->
  <div class="content-wrapper">
    <div class="content">
            <!-- Top Statistics -->
            <div class="row">
              <div class="col-xl-3 col-sm-6">
                <div class="card card-default card-mini">
                  <div class="card-header">
                    <h2>{{ $postsCount }}</h2>
                    <div class="dropdown">
                      <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                    <div class="sub-title">
                        <span class="mr-1">Posts</span><i style="color: blue" class="far fa-address-card"></i>
                        <span class="mx-1"></span>

                    </div>
                  </div>

                </div>
              </div>
              <div class="col-xl-3 col-sm-6">
                <div class="card card-default card-mini">
                  <div class="card-header">
                    <h2>{{ $tagsCount }}</h2>
                    <div class="dropdown">
                      <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                    <div class="sub-title">
                        <span class="mr-1">Tags</span><i style="color: blue" class="fa-solid fa-tag"></i>
                        <span class="mx-1"></span>     </div>
                  </div>

                </div>
              </div>
              <div class="col-xl-3 col-sm-6">
                <div class="card card-default card-mini">
                  <div class="card-header">
                    <h2>{{ $categoriesCount }}</h2>
                    <div class="dropdown">
                      <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                    <div class="sub-title">
                        <span class="mr-1">Catergories</span><i style="color: blue" class="fa-regular fa-rectangle-list"></i>
                        <span class="mx-1"></span>      </div>
                  </div>

                </div>
              </div>
              <div class="col-xl-3 col-sm-6">
                <div class="card card-default card-mini">
                  <div class="card-header">
                    <h2>{{ $usersCount }}</h2>

                    <div class="dropdown">
                      <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </div>
                    <div class="sub-title">
                        <span class="mr-1">Users</span><i style="color: blue" class="fa-solid fa-user"></i>
                        <span class="mx-1"></span>     </div>
                  </div>

                </div>
              </div>
            </div>




</div>


@endsection
@section('scripts')
<script src="{{ asset('assets/auth/plugins/apexcharts/apexcharts.js') }}"></script>
<script src="{{ asset('assets/auth/js/chart.js') }}"></script>
<script>

    $(document).ready(function(){

        $('#logout-button').click(function(){
            $('#logout-form').submit();

        });
    });
</script>

@endsection
