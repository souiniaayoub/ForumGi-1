<!DOCTYPE html>
<html>

<head>
    <title>PHP Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/loginStyle.css">

    <!-- Fav icon -->
    <link rel="shortcut icon" type="image/x-icon" href="layout/img/favicon.ico" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>

<body>
    <div class="form">
        <div class="row">
            <div class="col-md-4"></div>

            <div class="col-md-4">
                <div class="login-header">
                    <h2><span>FORUM</span><span style="color: orange">INO</span></span>
                </div>
                <div class="login-body">
                    <form action="inc/login.inc.php" method="post" class="login form-content current" id="login">
                        <h2>Welcome To Our universe</h2>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button class="btn submit" name="singIn" style="color: orange;">Marhaba</button>
                        </div>
                    </form>
                    <form action="inc/signup.inc.php" method="post" class="signup form-content" id="signup">
                        <h2>Signup</h2>
                        <div class="form-group">
                            <input name="userName" type="text" class="form-control" placeholder="Full Name">
                        </div>
                        <div class="form-group">
                            <input name="cne" type="text" class="form-control" placeholder="CNE">
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <div id="year" class="cntr">
                            <label for="rdo-1" class="btn-radio">
                                <input type="radio" id="rdo-1" name="year" value="1">
                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                    <circle cx="10" cy="10" r="9"></circle>
                                    <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                    <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                                </svg>
                                <span>First Year</span>
                            </label>
                            <label for="rdo-2" class="btn-radio">
                                <input type="radio" id="rdo-2" name="year" value="2">
                                <svg width="20px" height="20px" viewBox="0 0 20 20">
                                    <circle cx="10" cy="10" r="9"></circle>
                                    <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                    <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                                </svg>
                                <span>Second Year</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <button class="btn submit" name="singUp" style="color: orange;">Marhaba</button>
                        </div>

                    </form>
                </div>
                <div class="login-footer">
                    <ul class="tabs">
                        <li class="current" data-tab="login">
                            <a href="#login">Login</a>
                        </li>
                        <li data-tab="signup">
                            <a href="#signup">Signup</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('ul.tabs li').click(function() {
                var tab_id = $(this).attr('data-tab');
                $('ul.tabs li').removeClass('current');
                $('.form-content').removeClass('current');
                $(this).addClass('current');
                $("#" + tab_id).addClass('current');
            })
        });
    </script>

</body>

</html>