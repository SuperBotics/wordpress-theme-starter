<?php get_header(); ?>
    
    <div class="blog-header">
        <div class="content">
        	<?php
				the_archive_title( '<h1 class="archive-title">', '</h1>' );
				the_archive_description( '<div class="archive-tagline">', '</div>' );
			?>
        </div>
    </div>
    <div class="blog-content has-side-bar">
        <div class="blog-posts">
            <?php if(have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>
                    <article class="<?php post_class(); ?>">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h2 class="post-title"><?php the_title(); ?></h2></a>
                        <div class='post-content'><?php the_content(); ?></div>  
                    </article>
                <?php endwhile; ?>
                
                <?php Theme_Helpers::load_template('common-elements/pagination.php'); ?>
            <?php endif; ?>
        </<div>
        <?php get_sidebar(); ?>
    </div>
    
    
    

<?php get_footer(); ?>