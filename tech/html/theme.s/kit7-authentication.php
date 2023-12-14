<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Bulkit :: Authentication</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />

    <!--Core CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bulma.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/core.css">

</head>

<body class="is-theme-core">
    <div class="pageloader"></div>
    <div class="infraloader is-active"></div>
    <div class="auth-nav">
        <a href="index.php">
            <img class="switcher-logo" src="assets/img/logos/logo/bulkit-core.svg" alt="">
        </a>
    </div>

    <div class="auth-outer">

        <div class="mobile-auth-toggle">
            <h3 class="title">Have an account?</h3>
            <button type="button" class="button action-btn is-rounded">Register</button>
        </div>

        <div class="auth-box shadow">
            <div class="form-wrapper">
                <div class="login">
                    <div class="header">
                        <h2 class="title is-4">Login</h2>
                    </div>
                    <div class="item-list">
                        <div class="item shadow">
                            <a><i class="fa fa-google"></i></a>
                            <a><i class="fa fa-facebook"></i></a>
                            <a><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="body">
                        <form>
                            <div class="field">
                                <div class="control">
                                    <input type="text" class="input" placeholder="Email">
                                    <div class="form-icon">
                                        <i class="sl sl-icon-envelope-open"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input type="password" class="input" placeholder="Password">
                                    <div class="form-icon">
                                        <i class="sl sl-icon-lock"></i>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="button primary-btn raised is-rounded is-bold">Login</button>
                            <a href="kit7-authentication.php#" class="forgot-password">
                                Forgot Password?
                            </a>
                        </form>
                    </div>
                </div>
                <div class="register">
                    <div class="header">
                        <h2 class="title is-4">Register</h2>
                    </div>
                    <div class="item-list">
                        <div class="item shadow">
                            <a><i class="fa fa-google"></i></a>
                            <a><i class="fa fa-facebook"></i></a>
                            <a><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="body">
                        <form>
                            <div class="field">
                                <div class="control">
                                    <input type="text" class="input" placeholder="Username">
                                    <div class="form-icon">
                                        <i class="sl sl-icon-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input type="text" class="input" placeholder="Email">
                                    <div class="form-icon">
                                        <i class="sl sl-icon-envelope-open"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <input type="password" class="input" placeholder="Password">
                                    <div class="form-icon">
                                        <i class="sl sl-icon-lock"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <button type="submit" class="button primary-btn raised is-rounded is-bold">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="side-box">
                <h3 class="title is-light">Have an account?</h3>
                <button type="button" class="button action-btn is-rounded">Register</button>
            </div>
        </div>
    </div>
    <div id="style-switcher" class="style-switcher visible">
        <div class="switcher-close">
            <i class="material-icons">close</i>
        </div>
        <!--Main Theme-->
        <div class="style-dot">
            <input type="radio" id="core" name="theme_selector" checked>
            <div class="style-dot-inner"></div>
        </div>
        <!--Main Theme-->
        <div class="style-dot">
            <input type="radio" id="purple" name="theme_selector">
            <div class="style-dot-inner is-purple"></div>
        </div>
        <!--Main Theme-->
        <div class="style-dot">
            <input type="radio" id="teal" name="theme_selector">
            <div class="style-dot-inner is-teal"></div>
        </div>
        <!--Main Theme-->
        <div class="style-dot">
            <input type="radio" id="green" name="theme_selector">
            <div class="style-dot-inner is-green"></div>
        </div>

        <!--Main Theme-->
        <div class="style-dot">
            <input type="radio" id="azur" name="theme_selector">
            <div class="style-dot-inner is-azur"></div>
        </div>
        <!--Main Theme-->
        <div class="style-dot">
            <input type="radio" id="blue" name="theme_selector">
            <div class="style-dot-inner is-blue"></div>
        </div>
        <!--Main Theme-->
        <div class="style-dot">
            <input type="radio" id="night" name="theme_selector">
            <div class="style-dot-inner is-night"></div>
        </div>
        <!--Main Theme-->
        <div class="style-dot">
            <input type="radio" id="yellow" name="theme_selector">
            <div class="style-dot-inner is-yellow"></div>
        </div>
        <!--Main Theme-->
        <div class="style-dot">
            <input type="radio" id="orange" name="theme_selector">
            <div class="style-dot-inner is-orange"></div>
        </div>
        <!--Main Theme-->
        <div class="style-dot">
            <input type="radio" id="red" name="theme_selector">
            <div class="style-dot-inner is-red"></div>
        </div>
    </div>
    <!-- Concatenated jQuery and plugins -->
    <script src="assets/js/app.js"></script>

    <!-- Bulkit js -->
    <script src="assets/js/functions.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/auth.js"></script>
</body>

</html>