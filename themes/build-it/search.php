<?php get_header(); ?>
        <div class="search">
        	<?php if ( have_posts() ) : ?>
    			<h1 class="search-title"><?php echo 'Search Results for <br><span>"' . get_search_query() . '"</span>'; ?></h1>
    		<?php else : ?>
    			<h1 class="search-title"><?php echo 'Nothing Found For <br><span>"' . get_search_query() . '"</span>'; ?></h1>
    		<?php endif; ?>
        </div>
        <div class="search-results">
            <div>
                <?php if ( have_posts() ) : ?>
        			<?php while ( have_posts() ) : the_post(); ?>
                        <article <?php post_class(); ?> >
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h2 class="post-title"><?php the_title(); ?></h2></a>
                            <div class="post-content"><?php the_content(); ?></div>
                        </article>
                    <?php endwhile; ?>          
                    
                    <?php Theme_Helpers::load_template('common-elements/pagination.php'); ?>
                <?php else : ?>
              		<div class="content-not-found">
            			<p class="text-center"><?php echo 'Sorry, but nothing matched your search terms. Please try again with some different keywords.'; ?></p>             		    
              		</div>
    			<?php endif; ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
        

<?php get_footer(); ?>