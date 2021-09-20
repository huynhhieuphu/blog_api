<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>API Blog</title>
    <!-- Nhúng framework boostrap -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <style>
        body {
            padding-top: 56px;
        }
    </style>
    @stack('style')
</head>
<body>

@include('partial-blog.top-navbar')

<section>
    <div class="container">
        <div class="row">
            <!-- content left -->
            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                @yield('main')
            </div>
            <!-- End content left -->
            <!-- content right -->
            @include('partial-blog.content-right')
            <!-- End content right -->
        </div>
    </div>

</section>

@include('partial-blog.footer')

@include('partial-blog.modal')

<!-- Nhúng library js -->
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
@stack('script')
</body>
</html>
