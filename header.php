<!DOCTYPE html>
<!--===============================================
:::::::::::::::::::::::::::::::::::::::::::::::::::
::::::::::::Autor: Yelitza Arreaza:::::::::::::::::
:::::::::::Ingeniero en Informática::::::::::::::::
::::::::::::::FrontEnd Developer:::::::::::::::::::
:::::::::::::::::::::::::::::::::::::::::::::::::::
================================================-->
<html <?php language_attributes() ?>>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="paginas web, aplicaciones movil, movil, diseño, desarrollo, economicas, paginas web economias">
        <meta name="description" content="">
        <meta name="google-site-verification" content="8URFkcR9G3dCT3V6ruA3REY4GqIPQLUnzXp5sylBZ14" />
        <title><?php the_title() ?></title>
        <link href= "<?php bloginfo('template_url'); ?>/style.min.css" rel='stylesheet' type='text/css' media="screen">
        <link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory');?>/favicon.png" />
        <link href='https://fonts.googleapis.com/css?family=Pacifico:400,200,200italic,300,300italic,400italic,600,600italic,700italic,700,900,900italic' rel='stylesheet' type='text/css'>

    <?php  wp_head(); ?>
    <body <?php body_class() ?>> 

 <nav class="navbar navbar-default">
      <div class="container-fluid">  
        <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
            <img src="<?php bloginfo('template_url'); ?>/images/logoPleisi.svg" alt="Logo Plaisi">
        </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo home_url('#'), '#'?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Cursos</a></li>                 
              <li><a href="<?php echo home_url('#'), '#'?>"><i class="fa fa-columns" aria-hidden="true"></i>Blog</a></li>
              <li class="paddingt5 suscribir"><a href="<?php echo home_url('#'), '#'?>">Suscribirme</a></li>
              <li class="paddingt5"><a href="<?php echo home_url('#'), '#'?>">Ingresar</a></li>
       
          </ul>
      
        </div>
      </div>
    </nav>
