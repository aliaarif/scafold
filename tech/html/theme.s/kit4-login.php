<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title> Bulkit :: Login</title>
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />

    <!--Core CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bulma.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/core.css">
</head>

<body>
    <div class="pageloader"></div>
    <div class="infraloader is-active"></div>
    <!-- Wrapper -->
    <div class="login-wrapper columns is-gapless">

        <!-- Form section -->
        <div class="column is-7">
            <div class="hero is-fullheight">
                <div class="hero-heading">
                    <div class="auth-logo">
                        <a href="index.php"><img class="top-logo switcher-logo" src="assets/img/logos/logo/bulkit-core.svg" alt=""></a>
                    </div>
                </div>
                <div class="hero-body">
                    <div class="container">
                        <div class="columns">
                            <div class="column"></div>
                            <div class="column is-5">

                                <div class="auth-content">
                                    <h2>Welcome Back.</h2>
                                    <p>Please sign in to your account</p>
                                    <a href="kit4-signup.php">I do not have an account yet </a>
                                </div>

                                <!-- Login Form -->
                                <form>
                                    <div id="signin-form" class="login-form animated preFadeInLeft fadeInLeft">
                                        <!-- Input -->
                                        <div class="field pb-10">
                                            <div class="control has-icons-right">
                                                <input class="input is-medium has-shadow" type="text" placeholder="Username">
                                                <span class="icon is-medium is-right">
                                                        <i class="sl sl-icon-user"></i>
                                                    </span>
                                            </div>
                                        </div>
                                        <!-- Input -->
                                        <div class="field pb-10">
                                            <div class="control has-icons-right">
                                                <input class="input is-medium has-shadow" type="password" placeholder="Password">
                                                <span class="icon is-medium is-right">
                                                        <i class="sl sl-icon-lock"></i>
                                                    </span>
                                            </div>
                                        </div>
                                        <!-- Submit -->
                                        <p class="control login">
                                            <button class="button button-cta primary-btn btn-align-lg is-bold is-fullwidth rounded raised no-lh">Log in</button>
                                        </p>
                                    </div>
                                </form>

                                <!-- Reset Form -->
                                <form>
                                    <div id="recover-form" class="login-form animated preFadeInLeft fadeInLeft is-hidden">
                                        <!-- Input -->
                                        <div class="field pb-10">
                                            <div class="control has-icons-right">
                                                <input class="input is-medium has-shadow" type="text" placeholder="Email address">
                                                <span class="icon is-medium is-right">
                                                        <i class="sl sl-icon-envelope-open"></i>
                                                    </span>
                                            </div>
                                        </div>
                                        <!-- Submit -->
                                        <p class="control login">
                                            <button class="button button-cta primary-btn btn-align-lg is-bold is-fullwidth rounded raised no-lh">Reset password</button>
                                        </p>
                                    </div>
                                </form>

                                <!-- Toggles -->
                                <div id="recover" class="pt-10 pb-10 forgot-password animated preFadeInLeft fadeInLeft">
                                    <p class="has-text-centered">
                                        <a href="kit4-login.php#">Forgot password ?</a>
                                    </p>
                                </div>

                                <div id="back-to-login" class="pt-10 pb-10 forgot-password animated preFadeInLeft fadeInLeft is-hidden">
                                    <p class="has-text-centered">
                                        <a href="kit4-login.php#">Back to Sign in</a>
                                    </p>
                                </div>
                            </div>
                            <div class="column"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Image section (hidden on mobile) -->
        <div class="column login-column is-5 is-hidden-mobile hero-banner">
            <div class="hero is-fullheight is-theme-primary is-relative">
                <div class="columns has-text-centered">
                    <div class="column">
                        <h2 class="title is-2 light-text">
                            Start managing now
                        </h2>
                        <h3 class="subtitle is-5 light-text">
                            Stop struggling with common tasks and focus on the real choke points. Discover a full featured HR management platform.
                        </h3>
                        <div class="mt-30 has-text-centered">
                            <a href="kit4-signup.php" class="button button-cta btn-outlined is-bold light-btn rounded">Get started Free</a>
                        </div>
                    </div>
                </div>
                <img class="login-city" src="assets/img/graphics/compositions/city.svg" alt="">
            </div>
        </div>
    </div>
    <!-- Side navigation -->
    <div class="side-navigation-menu">
        <!-- Categories menu -->
        <div class="category-menu-wrapper">
            <!-- Menu -->
            <ul class="categories">
                <li class="square-logo"><img src="assets/img/logos/square-white.svg" alt=""></li>
                <li class="category-link is-active" data-navigation-menu="demo-pages"><i class="sl sl-icon-layers"></i></li>
                <li class="category-link" data-navigation-menu="onepagers"><i class="sl sl-icon-docs"></i></li>
                <li class="category-link" data-navigation-menu="components"><i class="sl sl-icon-grid"></i></li>
            </ul>
            <!-- Menu -->

            <ul class="author">
                <li>
                    <!-- Theme author -->
                    <a href="https://cssninja.io" target="_blank">
                        <img class="main-menu-author" src="assets/img/logos/cssninja.svg" alt="">
                    </a>
                </li>
            </ul>
        </div>
        <!-- /Categories menu -->

        <!-- Navigation menu -->
        <div id="demo-pages" class="navigation-menu-wrapper animated preFadeInRight fadeInRight">
            <!-- Navigation Header -->
            <div class="navigation-menu-header">
                <span>V1 pages</span>
                <a class="ml-auto hamburger-btn navigation-close" href="javascript:void(0);">
                    <span class="menu-toggle">
                            <span class="icon-box-toggle">
                                <span class="rotate">
                                    <i class="icon-line-top"></i>
                                    <i class="icon-line-center"></i>
                                    <i class="icon-line-bottom"></i>
                                </span>
                    </span>
                    </span>
                </a>
            </div>
            <!-- Navigation Body -->
            <ul class="navigation-menu">
                <li class="has-children"><a class="parent-link" href="kit4-login.php#"><span class="material-icons">weekend</span>Agency kit</a>
                    <ul>
                        <li><a class="is-submenu" href="agency-home.php">Homepage</a></li>
                        <li><a class="is-submenu" href="agency-about.php">About</a></li>
                        <li><a class="is-submenu" href="agency-portfolio.php">Portfolio</a></li>
                        <li><a class="is-submenu" href="agency-contact.php">Contact</a></li>
                        <li><a class="is-submenu" href="agency-blog.php">Blog</a></li>
                        <li><a class="is-submenu" href="agency-post-nosidebar.php">Post no sidebar</a></li>
                    </ul>
                </li>
                <li class="has-children"><a class="parent-link" href="kit4-login.php#"><span class="material-icons">wb_incandescent</span>Startup kit</a>
                    <ul>
                        <li><a class="is-submenu" href="startup-landing.php">Homepage</a></li>
                        <li><a class="is-submenu" href="startup-about.php">About</a></li>
                        <li><a class="is-submenu" href="startup-product.php">Product</a></li>
                        <li><a class="is-submenu" href="startup-contact.php">Contact</a></li>
                        <li><a class="is-submenu" href="startup-login.php">Login</a></li>
                        <li><a class="is-submenu" href="startup-signup.php">Sign up</a></li>
                    </ul>
                </li>
                <li class="has-children"><a class="parent-link" href="kit4-login.php#"><span class="material-icons">apps</span>Landing kit 1</a>
                    <ul>
                        <li><a class="is-submenu" href="kit1-landing.php">Landing page v1</a></li>
                        <li><a class="is-submenu" href="kit1-landing-2.php">Landing page v2</a></li>
                        <li><a class="is-submenu" href="kit1-landing-3.php">Landing page v3</a></li>
                        <li><a class="is-submenu" href="kit1-landing-4.php">Landing page v4</a></li>
                        <li><a class="is-submenu" href="kit1-landing-5.php">Landing page v5</a></li>
                        <li><a class="is-submenu" href="kit1-landing-6.php">Landing page v6</a></li>
                        <li><a class="is-submenu" href="kit1-features.php">Feature page</a></li>
                        <li><a class="is-submenu" href="kit1-pricing.php">Pricing page</a></li>
                        <li><a class="is-submenu" href="kit1-login.php">Login page</a></li>
                        <li><a class="is-submenu" href="kit1-signup.php">Signup page</a></li>
                    </ul>
                </li>
                <li class="has-children"><a class="parent-link" href="kit4-login.php#"><span class="material-icons">timelapse</span>Landing kit 2</a>
                    <ul>
                        <li><a class="is-submenu" href="kit2-landing.php">Landing page v1</a></li>
                        <li><a class="is-submenu" href="kit2-landing-2.php">Landing page v2</a></li>
                        <li><a class="is-submenu" href="kit2-landing-3.php">Landing page v3</a></li>
                        <li><a class="is-submenu" href="kit2-landing-4.php">Landing page v4</a></li>
                        <li><a class="is-submenu" href="kit2-landing-5.php">Landing page v5</a></li>
                        <li><a class="is-submenu" href="kit2-landing-6.php">Landing page v6</a></li>
                        <li><a class="is-submenu" href="kit2-landing-7.php">Landing page v7</a></li>
                        <li><a class="is-submenu" href="kit2-landing-8.php">Landing page v8</a></li>
                        <li><a class="is-submenu" href="kit2-features.php">Feature page</a></li>
                        <li><a class="is-submenu" href="kit2-pricing.php">Pricing page</a></li>
                        <li><a class="is-submenu" href="kit2-login.php">Login page</a></li>
                        <li><a class="is-submenu" href="kit2-signup.php">Signup page</a></li>
                    </ul>
                </li>
                <li class="has-children"><a class="parent-link" href="kit4-login.php#"><span class="material-icons">assistant</span>Landing kit 3</a>
                    <ul>
                        <li><a class="is-submenu" href="kit3-landing.php">Landing page v1</a></li>
                        <li><a class="is-submenu" href="kit3-landing-2.php">Landing page v2</a></li>
                        <li><a class="is-submenu" href="kit3-features.php">Feature page</a></li>
                        <li><a class="is-submenu" href="kit3-pricing.php">Pricing page</a></li>
                        <li><a class="is-submenu" href="kit3-login.php">Login page</a></li>
                        <li><a class="is-submenu" href="kit3-signup.php">Signup page</a></li>
                    </ul>
                </li>
                <li class="has-children"><a class="parent-link" href="kit4-login.php#"><span class="material-icons">brightness_2</span>Landing kit 4</a>
                    <ul>
                        <li><a class="is-submenu" href="kit4-landing.php">Landing page</a></li>
                        <li><a class="is-submenu" href="kit4-pricing.php">Pricing page</a></li>
                        <li><a class="is-submenu" href="kit4-help.php">Help center</a></li>
                        <li><a class="is-submenu" href="kit4-help-category.php">Help category</a></li>
                        <li><a class="is-submenu" href="kit4-help-article.php">Help article</a></li>
                        <li><a class="is-submenu" href="kit4-signup.php">Sign Up</a></li>
                        <li><a class="is-submenu" href="kit4-login.php">Login</a></li>
                    </ul>
                </li>
                <li class="has-children"><a class="parent-link" href="kit4-login.php#"><span class="material-icons">toys</span>Landing kit 5</a>
                    <ul>
                        <li><a class="is-submenu" href="kit5-landing.php">Landing page</a></li>
                        <li><a class="is-submenu" href="kit5-features.php">Feature page</a></li>
                        <li><a class="is-submenu" href="kit5-pricing.php">Pricing Page</a></li>
                        <li><a class="is-submenu" href="kit5-login.php">Login / Signup</a></li>
                    </ul>
                </li>
                <li class="has-children"><a class="parent-link" href="kit4-login.php#"><span class="material-icons">mouse</span>Landing kit 6</a>
                    <ul>
                        <li><a class="is-submenu" href="kit6-landing.php">Landing page</a></li>
                        <li><a class="is-submenu" href="kit6-login.php">Login page</a></li>
                        <li><a class="is-submenu" href="kit6-signup.php">Signup page</a></li>
                    </ul>
                </li>
                <li class="has-children"><a class="parent-link" href="kit4-login.php#"><span class="material-icons">work</span>Landing kit
                        7</a>
                    <ul>
                        <li><a class="is-submenu" href="kit7-landing.php">Landing page</a></li>
                        <li><a class="is-submenu" href="kit7-landing.php">Landing page v2</a></li>
                        <li><a class="is-submenu" href="kit7-authentication.php">Auth page</a></li>
                        <li><a class="is-submenu" href="kit7-pricing.php">Pricing page</a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a class="parent-link" href="kit4-login.php#">
                        <span class="material-icons">public</span>Landing kit 8</a>
                    <ul>
                        <li><a class="is-submenu" href="kit8-landing.php">Landing page v1</a></li>
                        <li><a class="is-submenu" href="kit8-landing-1.php">Landing page v2</a></li>
                        <li><a class="is-submenu" href="kit8-landing-2.php">Landing page v3</a></li>
                        <li><a class="is-submenu" href="kit8-landing-3.php">Landing page v4</a></li>
                        <li><a class="is-submenu" href="kit8-landing-4.php">Landing page v5</a></li>
                        <li><a class="is-submenu" href="kit8-pricing.php">Pricing page</a></li>
                        <li><a class="is-submenu" href="kit8-jobs.php">Jobs page</a></li>
                        <li><a class="is-submenu" href="kit8-login.php">Login page</a></li>
                        <li><a class="is-submenu" href="kit8-signup.php">Signup page</a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a class="parent-link" href="kit4-login.php#">
                        <span class="material-icons">assessment</span>Landing kit 9</a>
                    <ul>
                        <li><a class="is-submenu" href="kit9-landing.php">Landing page v1</a></li>
                        <li><a class="is-submenu" href="kit9-landing-2.php">Landing page v2</a></li>
                        <li><a class="is-submenu" href="kit9-landing-3.php">Landing page v3</a></li>
                        <li><a class="is-submenu" href="kit9-landing-4.php">Landing page v4</a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a class="parent-link" href="kit4-login.php#">
                        <span class="material-icons">account_balance</span>Landing kit 10</a>
                    <ul>
                        <li><a class="is-submenu" href="kit10-landing.php">Landing page v1</a></li>
                        <li><a class="is-submenu" href="kit10-landing-2.php">Landing page v2</a></li>
                        <li><a class="is-submenu" href="kit10-landing-3.php">Landing page v3</a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a class="parent-link" href="kit4-login.php#">
                        <span class="material-icons">shop</span>Landing kit 11</a>
                    <ul>
                        <li><a class="is-submenu" href="kit11-landing.php">Landing page v1</a></li>
                        <li><a class="is-submenu" href="kit11-landing-2.php">Landing page v2</a></li>
                        <li><a class="is-submenu" href="kit11-landing-3.php">Landing page v3</a></li>
                        <li><a class="is-submenu" href="kit11-landing-4.php">Landing page v4</a></li>
                        <li><a class="is-submenu" href="kit11-landing-5.php">Landing page v5</a></li>
                        <li><a class="is-submenu" href="kit11-landing-6.php">Landing page v6</a></li>
                        <li><a class="is-submenu" href="kit11-landing-7.php">Landing page v7</a></li>
                        <li><a class="is-submenu" href="kit11-landing-8.php">Landing page v8</a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a class="parent-link" href="kit4-login.php#">
                        <span class="material-icons">stars</span>Landing kit 12</a>
                    <ul>
                        <li><a class="is-submenu" href="kit12-landing.php">Landing page v1</a></li>
                        <li><a class="is-submenu" href="kit12-landing-2.php">Landing page v2</a></li>
                        <li><a class="is-submenu" href="kit12-landing-3.php">Landing page v3</a></li>
                        <li><a class="is-submenu" href="kit12-landing-4.php">Landing page v4</a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a class="parent-link" href="kit4-login.php#">
                        <span class="material-icons">new_releases</span>Landing kit 13</a>
                    <ul>
                        <li><a class="is-submenu" href="kit13-landing.php">Landing page v1</a></li>
                        <li><a class="is-submenu" href="kit13-landing-2.php">Landing page v2</a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a class="parent-link" href="kit4-login.php#">
                        <span class="material-icons">code</span>Landing kit 14</a>
                    <ul>
                        <li><a class="is-submenu" href="kit14-landing.php">Landing page v1</a></li>
                        <li><a class="is-submenu" href="kit14-landing-2.php">Landing page v2</a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a class="parent-link" href="kit4-login.php#">
                        <span class="material-icons">settings</span>Landing kit 15</a>
                    <ul>
                        <li><a class="is-submenu" href="kit15-landing.php">Landing page v1</a></li>
                        <li><a class="is-submenu" href="kit15-landing-2.php">Landing page v2</a></li>
                        <li><a class="is-submenu" href="kit15-landing-3.php">Landing page v3</a></li>
                        <li><a class="is-submenu" href="kit15-landing-4.php">Landing page v4</a></li>
                        <li><a class="is-submenu" href="kit15-about.php">About page</a></li>
                        <li><a class="is-submenu" href="kit15-contact.php">Contact page</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Navigation menu -->
        <div id="onepagers" class="navigation-menu-wrapper animated preFadeInRight fadeInRight is-hidden">
            <!-- Navigation Header -->
            <div class="navigation-menu-header">
                <span>Sub Pages</span>
                <a class="ml-auto hamburger-btn navigation-close" href="javascript:void(0);">
                    <span class="menu-toggle">
                            <span class="icon-box-toggle">
                                <span class="rotate">
                                    <i class="icon-line-top"></i>
                                    <i class="icon-line-center"></i>
                                    <i class="icon-line-bottom"></i>
                                </span>
                    </span>
                    </span>
                </a>
            </div>
            <!-- Navigation body -->
            <ul class="navigation-menu">
                <li class="has-children"><a class="parent-link has-new" href="kit4-login.php#"><span class="material-icons">domain</span>Company</a>
                    <ul>
                        <li><a class="is-submenu" href="about-page-1.php">About v1</a></li>
                        <li><a class="is-submenu" href="about-page-2.php">About v2</a></li>
                        <li><a class="is-submenu" href="case-study-1.php">Case Study v1</a></li>
                    </ul>
                </li>
                <li class="has-children"><a class="parent-link has-new" href="kit4-login.php#"><span class="material-icons">call</span>Contact</a>
                    <ul>
                        <li><a class="is-submenu" href="contact-page-1.php">Contact v1</a></li>
                        <li><a class="is-submenu" href="contact-page-2.php">Contact v2</a></li>
                        <li><a class="is-submenu" href="contact-page-3.php">Contact v3</a></li>
                        <li><a class="is-submenu" href="contact-page-4.php">Contact v4</a></li>
                        <li><a class="is-submenu" href="contact-page-5.php">Contact v5</a></li>
                    </ul>
                </li>
                <li class="has-children"><a class="parent-link has-new" href="kit4-login.php#"><span class="material-icons">book</span>Blog</a>
                    <ul>
                        <li><a class="is-submenu" href="blog-posts-full.php">Posts List v1</a></li>
                        <li><a class="is-submenu" href="blog-posts-full-alt.php">Posts List v2</a></li>
                        <li><a class="is-submenu" href="blog-posts-side.php">Posts List v3</a></li>
                        <li><a class="is-submenu" href="blog-posts-side-alt.php">Posts List v4</a></li>
                        <li><a class="is-submenu" href="blog-posts-grid-full.php">Posts Grid v1</a></li>
                        <li><a class="is-submenu" href="blog-posts-grid-full-masonry.php">Posts Grid v2</a></li>
                        <li><a class="is-submenu" href="blog-posts-grid-side.php">Posts Grid v3</a></li>
                        <li><a class="is-submenu" href="blog-posts-grid-side-masonry.php">Posts Grid v4</a></li>
                        <li><a class="is-submenu" href="blog-single-full.php">Single Post V1</a></li>
                        <li><a class="is-submenu" href="blog-single-side.php">Single Post V2</a></li>
                    </ul>
                </li>
                <li class="has-children">
                    <a class="parent-link has-new" href="kit4-login.php#"><span class="material-icons">highlight</span>Error Pages</a>
                    <ul>
                        <li><a class="is-submenu" href="error-1.php">Error v1</a></li>
                        <li><a class="is-submenu" href="error-2.php">Error v2</a></li>
                        <li><a class="is-submenu" href="error-3.php">Error v3</a></li>
                        <li><a class="is-submenu" href="error-4.php">Error v4</a></li>
                        <li><a class="is-submenu" href="error-5.php">Error v5</a></li>
                        <li><a class="is-submenu" href="error-6.php">Error v6</a></li>
                        <li><a class="is-submenu" href="error-7.php">Error v7</a></li>
                        <li><a class="is-submenu" href="error-8.php">Error v8</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Navigation menu -->
        <div id="components" class="navigation-menu-wrapper animated preFadeInRight fadeInRight is-hidden">
            <!-- Navigation Header -->
            <div class="navigation-menu-header">
                <span>Components</span>
                <a class="ml-auto hamburger-btn navigation-close" href="javascript:void(0);">
                    <span class="menu-toggle">
                            <span class="icon-box-toggle">
                                <span class="rotate">
                                    <i class="icon-line-top"></i>
                                    <i class="icon-line-center"></i>
                                    <i class="icon-line-bottom"></i>
                                </span>
                    </span>
                    </span>
                </a>
            </div>
            <!-- Navigation body -->
            <ul class="navigation-menu">
                <li class="has-children"><a class="parent-link" href="kit4-login.php#"><span class="material-icons">view_quilt</span>Layout</a>
                    <ul>
                        <li><a class="is-submenu" href="_components-layout-grid.php">Grid system</a></li>
                        <li><a class="is-submenu" href="_components-layout-video.php">Video background</a></li>
                        <li><a class="is-submenu" href="_components-layout-parallax.php">Parallax</a></li>
                        <li><a class="is-submenu" href="_components-layout-headers.php">Headers</a></li>
                        <li><a class="is-submenu" href="_components-layout-footers.php">Footers</a></li>
                        <li><a class="is-submenu" href="_components-layout-typography.php">Typography</a></li>
                        <li><a class="is-submenu" href="_components-layout-colors.php">Colors</a></li>
                    </ul>
                </li>
                <li class="has-children"><a class="parent-link" href="kit4-login.php#"><span class="material-icons">subject</span>Navbars</a>
                    <ul>
                        <li><a class="is-submenu" href="_components-layout-navbar-fade-light.php">Fade light</a></li>
                        <li><a class="is-submenu" href="_components-layout-navbar-fade-dark.php">Fade dark</a></li>
                        <li><a class="is-submenu" href="_components-layout-navbar-static-light.php">Static
                                light</a></li>
                        <li><a class="is-submenu" href="_components-layout-navbar-static-dark.php">Static
                                dark</a></li>
                        <li><a class="is-submenu" href="_components-layout-navbar-static-solid.php">Static
                                solid</a></li>
                        <li><a class="is-submenu" href="_components-layout-navbar-double-dark.php">Double
                                dark</a></li>
                        <li><a class="is-submenu" href="_components-layout-navbar-double-light.php">Double
                                light</a></li>
                    </ul>
                </li>
                <li class="has-children"><a class="parent-link" href="kit4-login.php#"><span class="material-icons">view_stream</span>Sections</a>
                    <ul>
                        <li><a class="is-submenu" href="_components-sections-features.php">Features</a></li>
                        <li><a class="is-submenu" href="_components-sections-pricing.php">Pricing</a></li>
                        <li><a class="is-submenu" href="_components-sections-team.php">Team</a></li>
                        <li><a class="is-submenu" href="_components-sections-testimonials.php">Testimonials</a></li>
                        <li><a class="is-submenu" href="_components-sections-clients.php">Clients</a></li>
                        <li><a class="is-submenu" href="_components-sections-counters.php">Counters</a></li>
                        <li><a class="is-submenu" href="_components-sections-carousel.php">Carousel</a></li>
                    </ul>
                </li>
                <li class="has-children"><a class="parent-link" href="kit4-login.php#"><span class="material-icons">playlist_add_check</span>Basic
                        UI</a>
                    <ul>
                        <li><a class="is-submenu" href="_components-basicui-cards.php">Cards</a></li>
                        <li><a class="is-submenu" href="_components-basicui-buttons.php">Buttons</a></li>
                        <li><a class="is-submenu" href="_components-basicui-dropdowns.php">Dropdowns</a></li>
                        <li><a class="is-submenu" href="_components-basicui-lists.php">Lists</a></li>
                        <li><a class="is-submenu" href="_components-basicui-modals.php">Modals</a></li>
                        <li><a class="is-submenu" href="_components-basicui-tabs.php">Tabs & pills</a></li>
                        <li><a class="is-submenu" href="_components-basicui-accordion.php">Accordions</a></li>
                        <li><a class="is-submenu" href="_components-basicui-badges.php">Badges & labels</a></li>
                        <li><a class="is-submenu" href="_components-basicui-popups.php">Popups</a></li>
                    </ul>
                </li>
                <li class="has-children"><a class="parent-link" href="kit4-login.php#"><span class="material-icons">playlist_add</span>Advanced
                        UI</a>
                    <ul>
                        <li><a class="is-submenu" href="_components-advancedui-tables.php">Tables</a></li>
                        <li><a class="is-submenu" href="_components-advancedui-timeline.php">Timeline</a></li>
                        <li><a class="is-submenu" href="_components-advancedui-boxes.php">Boxes</a></li>
                        <li><a class="is-submenu" href="_components-advancedui-messages.php">Messages</a></li>
                        <li><a class="is-submenu" href="_components-advancedui-megamenu.php">Megamenu</a></li>
                        <li><a class="is-submenu" href="_components-advancedui-calendar.php">Calendar</a></li>
                    </ul>
                </li>
                <li class="has-children"><a class="parent-link" href="kit4-login.php#"><span class="material-icons">check_box</span>Forms</a>
                    <ul>
                        <li><a class="is-submenu" href="_components-forms-inputs.php">Inputs</a></li>
                        <li><a class="is-submenu" href="_components-forms-controls.php">Controls</a></li>
                        <li><a class="is-submenu" href="_components-forms-layouts.php">Form layouts</a></li>
                        <li><a class="is-submenu" href="_components-forms-steps.php">Step forms</a></li>
                        <li><a class="is-submenu" href="_components-forms-uploader.php">Uploader</a></li>
                    </ul>
                </li>
                <li class="has-children"><a class="parent-link" href="kit4-login.php#"><span class="material-icons">adjust</span>Icons</a>
                    <ul>
                        <li><a class="is-submenu" href="_components-icons-im.php">Icons Mind</a></li>
                        <li><a class="is-submenu" href="_components-icons-sl.php">Simple Line Icons</a></li>
                        <li><a class="is-submenu" href="_components-icons-fa.php">Font Awesome</a></li>
                        <li><a class="is-submenu" href="https://material.io/icons/" target="_blank">Material Icons</a></li>
                        <li><a class="is-submenu" href="_components-extensions-iconpicker.php">Icon Picker</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /Navigation menu -->
    </div>
    <!-- /Side navigation -->
    <!-- Back To Top Button -->
    <div id="backtotop"><a href="kit4-login.php#"></a></div> <!-- Concatenated jQuery and plugins -->
    <script src="assets/js/app.js"></script>

    <!-- Bulkit js -->
    <script src="assets/js/functions.js"></script>
    <script src="assets/js/auth.js"></script>
    <script src="assets/js/contact.js"></script>
    <script src="assets/js/main.js"></script>

    <!-- Landing page js -->
</body>

</html>