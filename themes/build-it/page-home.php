<?php
/*
 * Template Name: Home page
 */

get_header(); ?>

    <?php if(have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <article class="<?php post_class(); ?>">
                <h2 class="post-title"><?php the_title(); ?></h2>  
                <div class='post-content'><?php the_content(); ?></div>  
            </article>
        <?php endwhile; ?>
    <?php endif; ?>

<?php get_footer(); ?>