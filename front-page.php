<?php get_header(); ?>
<!--===============================================-->
<!--::::::::::::::Inicio banner::::::::::::::::::::-->
<!--===============================================-->
<section style="height: 578px;" class=" animated">
    <div id="owl-demo" class="owl-carousel owl-theme"  style="display: inline-block;z-index: -1;position: initial;">
        <?php $argsb = array(
        'post_type' => 'banner',
        'posts_per_page' => -1); ?>
        <?php query_posts($argsb);
            while (have_posts()) : the_post(); ?>
                <div class="item" <?php
                    if ($thumbnail_id = get_post_thumbnail_id()) {
                        if ($image_src = wp_get_attachment_image_src($thumbnail_id, 'full'))
                            printf('style="height:578px;background-repeat: no-repeat;background-position: center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;background-image: url(%s)"', $image_src[0]);
                    }
                    ?>>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">

                            <div class="col-md-12 banner-info nuestrosAliados">
                                <div class="descripBanner marginb60">
                                    <h3> <?php the_title(); ?></h3>
                                    <h2><?php the_content(); ?></h2>
                                </div>
                                <div class="verCursos">
                                   <a href="#"> Ver Cursos</a>
                                </div>                                      
                            </div> </div>                      
                        </div>
                    </div>
                    <div class="mask"></div>
                </div>
            <?php endwhile; ?>
        <?php wp_reset_postdata();?>
    </div>         
</section>
<!--===============================================-->
<!--:::::::::::::::::Fin banner::::::::::::::::::::-->
<!--===============================================-->

<!--===============================================-->
<!--::::::::::Inicio cursos destacados:::::::::::::-->
<!--===============================================-->         
<section id="cursosDestacados">
     <div class="container">
        <div class="row">
             <div class="col-md-12 col-sm-12  col-xs-12 tituPpal">
                <h3> - Cursos Destacados - </h3>                                     
            </div>
            <div class="col-md-12 col-md-12 col-sm-12  col-xs-12 contenido  no-padding center"> 
               <?php 
                    $argst = array(
                     'post_type' => 'cursos',                
                     'posts_per_page' => 6,
                    );
                    query_posts($argst); 
                    while (have_posts()) : the_post(); ?>
                    <?php 
                        $capacidad =  get_post_meta($post->ID, 'capacidad', true);
                        $duracion =  get_post_meta($post->ID, 'duracion', true);
                        $precio =  get_post_meta($post->ID, 'precio', true);
                    ?>
                <div class="col-md-4 col-sm-6 col-xs-12 marginb40 hvr-float  wow fadeIn"> 
                   <div class="col-md-12  col-sm-12 col-xs-12 no-paddingl no-paddingr sombra"> 
                        <div class="clearfix"></div>                 
                        <?php   
                        $thumbID = get_post_thumbnail_id( $post->ID );
                        $imgDestacada = wp_get_attachment_url( $thumbID );                              
                        if ( has_post_thumbnail() ) { ?>
                            <a  id="single_image" class="fancybox" href="<?php echo $imgDestacada;?>"> 
                                <?php the_post_thumbnail('imgcurso', array('class' => "img-responsive imgcurso1 fancybox"));
                                } else { 
                                    echo '<img src="http://placehold.it/350x280" class="img-responsive imgcurso1 fancybox"/>';
                                }?>
                            </a>
                       
                            <div class="col-md-12 col-sm-12 col-xs-12  blogCursos marginb30">                            
                                <h3 class="margint20">  <a href="#"><?php the_title();?> </a></h3>
                                <h4> <?php the_content();?> </h4>
                                <?php if(function_exists('the_ratings')) { the_ratings(); } ?> 
                                <p><?php echo $capacidad; ?></p>
                                                    
                                <div class="col-md-12 col-xs-12 col-sm-12"> 
                                     <i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $duracion; ?>                            
                                     <a class="boton" href="#"><?php echo $precio; ?> </a>
                                </div>
                            </div>
                     
                    </div>
                </div>
                <?php endwhile; ?>     

            </div>

        </div>
        <div class="marginb100 margint30 textCenter">
           <a class="verTodos"" href="#"> Ver todos los cursos</a>
        </div>
    </div>
</section>
<!--===============================================-->
<!--:::::::::::::Fin cursos destacados:::::::::::::-->
<!--===============================================-->

<!--===============================================-->
<!--::::::::::Inicio como funciona Pleisi::::::::::-->
<!--===============================================-->
<?php 
 $comoFuncionaPleisi = get_page_by_path('como-funciona-pleisi');
 $breveDescripcion= get_post_meta($comoFuncionaPleisi->ID, 'breveDescripcion', true);
 $video= get_post_meta($comoFuncionaPleisi->ID, 'video', true); 
 $patrones= get_post_meta($comoFuncionaPleisi->ID, 'patrones', true); 
 $consulta= get_post_meta($comoFuncionaPleisi->ID, 'consulta', true); 
?> 
<section id="funcionPleisi">
    <div class="container">
        <div class="row paddingb100">
            <div class="col-md-12 tituPpal  texto">
                <h3> - Cómo Funciona Pleisi - </h3>
                 <p class="textCenter"><?php echo $breveDescripcion?></p>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <video class="video-controls" id="video1" controls="controls" poster="<?php bloginfo('template_url'); ?>/images/logoPleisi.svg">
                    <source  type="video/mp4" src="http://yelitzaarreazaabakoventures.hol.es/wp-content/uploads/2016/06/loop_Site.mp4" />
                    </video>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12  contenido margint100">
                    <div class="col-md-12 col-sm-12 col-xs-12  margint20"> 
                        <div class="col-md-2 col-sm-2 col-xs-12"> 
                            <img src="<?php bloginfo('template_url'); ?>/images/video.png">
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-10"> 
                            <p><?php echo $video ?></p>
                        </div>
                    </div>

                     <div class="col-md-12 col-sm-12 col-xs-12  margint20"> 
                        <div class="col-md-2 col-sm-2 col-xs-12"> 
                            <img src="<?php bloginfo('template_url'); ?>/images/patron.png">
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-12"> 
                            <p><?php echo $patrones ?></p>
                        </div>
                    </div>
                     <div class="col-md-12 col-sm-12 col-xs-12  margint20"> 
                        <div class="col-md-2 col-sm-2 col-xs-12"> 
                            <img src="<?php bloginfo('template_url'); ?>/images/consulta.png">  
                        </div>
                        <div class="col-md-10 col-sm-10 col-xs-10"> 
                            <p><?php echo $consulta ?></p>
                        </div>
                    </div>
                </div>           
            </div>            
        </div>
    </div>
</section>
<!--===============================================-->
<!--:::::::::::::Fin como funciona Pleisi::::::::::-->
<!--===============================================-->

<!--========================================-->
<!--:::::::::::::::::Inicio Fondo:::::::::::-->
<!--========================================-->
<div class="fondoHome">
    <div class="container">
        <div class="row">
            <div class="col-md-12 encima paddingt180">
                <h2>Accede a todos nuestros cursos por solo</h2>
                <h3>$19,000/mes</h3>
                <div class="marginb100 margint30 textCenter">
                   <a class="verTodos"" href="#">COMENZAR AHORA</a>
                </div>

            </div>
        </div>
    </div>
    <div class="mask"></div>
</div>
<!--========================================-->
<!--:::::::::::::::::Fin Fondo::::::::::::::-->
<!--========================================-->

<!--==========================================-->
<!--:::::::::::::::::Inicio Alumnas:::::::::::-->
<!--==========================================-->
<section id="alumnas">
     <div class="container">
        <div class="row">
             <div class="col-md-12 col-sm-12  col-xs-12 tituPpal">
                <h3> - Nuestras Alumnas - </h3>                                     
            </div>
            <div class="col-md-12 col-md-12 col-sm-12  col-xs-12 contenido  no-padding center"> 
               <?php 
                    $argst = array(
                     'post_type' => 'alumnas',                
                     'posts_per_page' => 6,
                    );
                    query_posts($argst); 
                    while (have_posts()) : the_post(); ?>
                        <div class="col-md-4 col-sm-6 col-xs-12 marginb40 hvr-float  wow fadeIn"> 
                           <div class="col-md-12  col-sm-12 col-xs-12 no-paddingl no-paddingr sombra">                  
                                <?php   
                                $thumbID = get_post_thumbnail_id( $post->ID );
                                $imgDestacada = wp_get_attachment_url( $thumbID );                              
                                if ( has_post_thumbnail() ) { ?>
                                    <a  id="single_image" class="fancybox" href="<?php echo $imgDestacada;?>"> 
                                        <?php the_post_thumbnail('imgcurso', array('class' => "img-responsive imgcurso1 fancybox"));
                                        } else { 
                                            echo '<img src="http://placehold.it/350x280" class="img-responsive imgcurso1 fancybox"/>';
                                        }?>
                                    </a>
                               
                                    <div class="col-md-12 col-sm-12 col-xs-12 alumna marginb30">                            
                                        <h2 class="margint20"><?php the_title();?></h2>
                                         <?php the_content();?>                          
                                    </div>
                             
                            </div>
                        </div>
                    <?php endwhile; ?>     
            </div>
        </div>
    </div>
</section>
<!--==========================================-->
<!--::::::::::::::::::::Fin Alumnas:::::::::::-->
<!--==========================================-->
<?php get_footer();?>
