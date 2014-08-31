<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <link rel="shortcut icon" href="<?= bloginfo('template_url'); ?>/favicon.png">
    
    <title><?php wp_title(''); ?></title>

    <meta name="viewport" content="initial-scale=1.0, width=device-width" />
    
    <link rel="author" href="<?= bloginfo('template_url'); ?>/humans.txt">

    <link rel="stylesheet" href="<?= bloginfo('template_url'); ?>/style.css">
    <link rel="stylesheet" href="<?= bloginfo('template_url'); ?>/css/style.css">
    <script src="<?= bloginfo('template_url'); ?>/js/vendor/modernizr.js"></script>

    <script>
    // Initialize global BALANCE object
    var BALANCE = {};
    </script>
<?php wp_head(); ?>
</head>

<body <?php body_class('preload'); ?>>

<nav id="small-screen-menu">
    <ul class="content">
        <?php wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class' => '',
            'container' => 'li',
            'container_class' => ''
        )); ?>
        <li>
            <a href="#">Schedule Appt</a>
        </li>
        <li>
            <a href="#">Client Login</a>
        </li>
        <hr>
        <div class="aligncenter"><h3>Find Us</h3>
            <address class="delicious lowercase">4719 Rosedale Ave.<br>Bethesda, MD 20814</address>
            <span class="delicious lowercase tel">T. <tel>301.986.1730</tel></span><br>
            <a href="#">Get Google Directions</a>
        </div>
    </ul>
</nav>

<div id="page" class="hfeed site">

	<!--[if lt IE 8]>
        <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
    <![endif]-->

<header>

    <nav role="navigation" class="full-width">
        <div>
            <div id="find-us-menu" class="menu">
                <div id="map" class="module">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m5!3m3!1m2!1s0x89b7c967244b8455%3A0x503d84c718a16f38!2s4719+Rosedale+Ave%2C+Bethesda%2C+MD+20814!5e0!3m2!1sen!2sus!4v1387505517373" width="100%" height="400" frameborder="0" style="border:0"></iframe>
                    <a class="content footer" href="#">Get Google Directions</a>
                </div>
                <address>4719 Rosedale Ave.<br>Bethesda, MD 20814</address>
                <span class="tel">T. <tel></tel>301.986.1730</span>

                <h3>Parking</h3>
                <div class="lowercase delicious">
                    <p>Please note that the garage extends under the street and will bring you over to our side of Rosedale Ave if you follow the signs for the NORTH BUILDING elevator.</p>

                    <ul>
                        <li>Park in one of the spaces marked “Retail."</li>
                        <li>Take the North Elevator to the retail level – “LR.”</li>
                        <li>Exit the elevator to the sidewalk, and turn LEFT.</li>
                        <li>Balance studio is located two doors down on your LEFT</li>
                    </ul>
                </div>
            </div>
        </div>
    	<ul>
            <li id="logo">
                <a class="item" href="<?= home_url(); ?>">
                    <img src="<?= bloginfo('template_url'); ?>/images/logo.png" alt="Balance Studio">
                </a>
            </li>
            <li id="menu" menu-target="sub-menu">
                <div id="sub-menu" class="menu">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => '',
                        'container' => 'li',
                        'container_class' => ''
                    )); ?>
                    <div class="social">
                        <a href="mailto:info@balancestudio.com" class="icon-envelope"></a>
                        <a href="https://twitter.com/balancestudio" class="icon-twitter" target="_blank"></a>
                        <a href="https://www.facebook.com/balancestudio" class="icon-facebook" target="_blank"></a>
                    </div>
                </div>
                <span>Menu</span>
            </li>
            <li>
                <a href="#">Schedule Appt</a>
            </li>
            <li>
                <a href="#">Client Login</a>
            </li>
            <li id="find-us" class="highlight" menu-target="find-us-menu">
                <a href="#">Find us!</a>
            </li>
            <li id="small-screen-menu-icon">
                <div class="stripe"></div>
                <div class="stripe"></div>
                <div class="stripe"></div>
            </li>
        </ul>
    </nav> 

</header>

<main>