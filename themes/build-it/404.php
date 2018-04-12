<?php get_header(); ?>

    <section class="error-404 not-found">
        <div class="page-content">
            <div class='content'>
                <div class="description">
                    <p>Oops! The Page you requested was not found!</p>
                     <p>you can go to <span><a href="/">home</a></span> page or search here</p>
                </div>
                <?php Theme_Helpers::load_template("common-elements/search-form.php"); ?>
            </div>  
        </div>
    </section>
       
<?php get_footer(); ?>