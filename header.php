<!doctype html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="UTF-8">
    <title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width" />
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/normalize.css"/>
     <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/js/prettify/prettify.css"/>
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>"/>

    <?php wp_head(); ?>


</head>
<body>
     <header id="header">
         <div class="header-image">
             <?php if(get_header_image()): ?>
            <img src="<?php echo esc_url(get_header_image()); ?>" alt="Header" id="header-img" />
            <?php endif; ?>
         </div>
         <div class="header-bk"></div>
         <div class="header-content-container" id="header-content">
             <div class="header-content">
                 <div class="hline" >
                     <h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
                     <h2><?php bloginfo('description'); ?></h2>

                     <div class="header-right">
                     <!--
                         <ul class="contact">
                             <li>
                                 <div class="icon-warp">
                                     <img src="https://twitter.com/images/resources/twitter-bird-light-bgs.png" alt="twitter"/>
                                 </div>
                             </li>
                             <li>
                                 <div class="icon-warp">
                                     <img src="https://a248.e.akamai.net/assets.github.com/images/modules/logos_page/Octocat.png" alt="twitter"/>
                                 </div>
                             </li>
                             <li>
                                 <div class="icon-warp">
                                     <img src="https://a248.e.akamai.net/assets.github.com/images/modules/logos_page/Octocat.png" alt="twitter"/>
                                 </div>
                             </li>
                         </ul>
                         -->
                         <form action="<?php bloginfo('url'); ?>/" method="POST" id="search-form">
                             <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
                             <button type="submit" name="serach-submit" id="serach-submit"><span class="icon-search"></span></button>
                         </form>
                     </div>
                 </div>
                 <nav>
                    <ul>
                       <li <?php if(is_front_page()) { ?>class="current_page_item"<?php } ?>><a href="<?php echo get_option('home'); ?>/">Home</a></li>
                        <?php wp_list_pages('sort_column=menu_order&title_li=' ); ?>
                     </ul>
                 </nav>

             </div>
         </div>
     </header>