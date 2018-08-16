<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ url('/backend/') }}/assets/css/normalize.css">
    <link rel="stylesheet" href="{{ url('/backend/') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/backend/') }}/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('/backend/') }}/assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{ url('/backend/') }}/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ url('/backend/') }}/assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ url('/backend/') }}/assets/scss/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="{{ url('/backend/') }}/images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    @if($errors->any() || Session::has('flash_message'))
                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                            <p><span class="badge badge-pill badge-danger">Error !!!</span></p>
                            {!! Session::get('flash_message')  !!}
                            @foreach($errors->all() as $error)
                                <p>{!! $error !!}</p>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div> 
                    @endif
                    <form method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="txtUsername" class="form-control" placeholder="User Name">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="txtPassword" class="form-control" placeholder="Password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="txtRemember"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#" onclick="alert('admin mà cũng quên password ???')">Forgotten Password?</a>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                        <!-- <div class="social-login-content">
                            <div class="social-button">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
                            </div>
                        </div> -->
                        <!-- <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="#"> Sign Up Here</a></p>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('/backend/') }}/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="{{ url('/backend/') }}/assets/js/popper.min.js"></script>
    <script src="{{ url('/backend/') }}/assets/js/plugins.js"></script>
    <script src="{{ url('/backend/') }}/assets/js/main.js"></script>
</body>
</html>