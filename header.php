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
<?php wp_head(); ?>
</head>

<body <?php body_class('preload'); ?>>
<div id="page" class="hfeed site">

	<!--[if lt IE 8]>
        <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
    <![endif]-->

<header>

    <nav role="navigation">
    	<ul>
            <li id="logo">
                <a class="item" href="<?= home_url(); ?>">
                    <img src="<?= bloginfo('template_url'); ?>/images/logo.png" alt="Balance Studio">
                </a>
            </li>
            <li id="menu">
                <span>Menu</span>
                <?php wp_nav_menu('Primary Menu'); ?>
            </li>
            <li>
                <a href="">Schedule Appt</a>
            </li>
            <li>
                <a href="">Client Login</a>
            </li>
            <li class="highlight">
                <a href="">Find us!</a>
            </li>
        </ul>
    </nav> 

</header>

<main>