<?php get_header(); ?>

    <div class="search-results">
        <div>
            <?php if ( have_posts() ) : ?>
    			<?php while ( have_posts() ) : the_post(); ?>
                    <article <?php post_class(); ?> >
                        <h3 class="post-title"><?php the_title(); ?></h3>
                        <div class="post-content"><?php the_content(); ?></div>
                    </article>
                <?php endwhile; ?>                 
            <?php else : ?>
          		<div class="content-not-found">
        			<p class="text-center"><?php echo 'Sorry, but nothing matched your search terms. Please try again with some different keywords.'; ?></p>             		    
          		</div>
			<?php endif; ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
    
<?php get_footer(); ?>