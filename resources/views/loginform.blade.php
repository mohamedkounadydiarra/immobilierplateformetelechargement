<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title></title>

    <!-- Favicon -->
    <link rel="icon" href="../userstyle/img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="../userstyle/style.css">

</head>

<body>
    <!-- Preloader -->
  
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(../userstyle/img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>Bienvenue</p>
            <h2>Login</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Login</h3>
                        <!-- Login Form -->
                        <div class="login-form">
                        @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                            <form action="{{route('login.auth')}}" method="post">
                            @csrf
                             @method('POST')
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="text" class="form-control" name="email" placeholder="eamil">
                                    @error('email')
                                    <p style="color:red;">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="password">
                                    @error('password')
                                    <p style="color:red;">{{$message}}</p>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="btn btn-primary form-control">Connexion</button>
                            
                                <br>
                                <a href="{{route('login.create')}}">Creer un compte!</a>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Login Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
        <h3>creer par dev moh</h3>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="../userstyle/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../userstyle/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../userstyle/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="../userstyle/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="../userstyle/js/active.js"></script>
</body>

</html>