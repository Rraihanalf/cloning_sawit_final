
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LOGIN PAGE</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('/') }}plugins/fontawesome-free/css/all.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{ asset('/') }}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('/') }}dist/css/adminlte.min.css">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
        <!-- /.login-logo -->
       

        <!--<div class="card-box">
            <div class="card-box text-start">
                <h1><b>Database</b></h1>
                <h1><b>Cloning Sawit</b></h1>
                
            </div>
        </div> -->

        <div class="row">
            <div class="col-">
                    <img src="{{ asset('/') }}assets/sawitlogo.png" width="110px" alt="">
            </div>
            <div class="col-w-10">
                <div class="card-box text-start">
                    <h1><b>Database</b></h1>
                    <h1><b>Cloning Sawit</b></h1>
                </div>
            </div>
        </div>

            <div class="card-body">

            <form action="{{ url('login/proses') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input autofocus type="text" class="form-control
                    @error('username')
                        is-invalid
                    @enderror" placeholder="Username" name="username">
                    
                    @error('username')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control
                    @error('password')
                        is-invalid
                    @enderror" placeholder="Password" name="password">
                    
                    @error('password')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class ="button-style">
                        <button class ="button" type="submit" >Sign In</button>
                </div>   
            </form>
            <!-- /.card-body -->
        
        <!-- /.card -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="{{ asset('/') }}plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('/') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('/') }}dist/js/adminlte.min.js"></script>
    </body>
</html>




<style>
    .button-style{
        display: grid;
      place-items: center;
    }

    button {
    display: inline-block;
      background: #4F6F52;
      color: #fff;
      width: 130px;
      height: 40px;
      border-radius: 15px;
      border: thin solid #888;
      white-space: nowrap;
      font-size: 16px;
      font-weight: normal;
      font-family: 'Roboto', sans-serif;
      margin: 0rem 0;
    }


  </style>