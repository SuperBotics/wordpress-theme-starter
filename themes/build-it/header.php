<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> >
        <header>
            <a href="<?php echo home_url("/"); ?>" title="<?php echo get_bloginfo('name'); ?>"><?php echo get_bloginfo('name') . ' | ' . get_bloginfo('description'); ?></a>
        </header>
        
        <main class="main" id="main">