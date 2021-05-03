<?php
/**
 * Template Name: Landing page for SpaceX VR
 *
 */
get_header( 'landing' ); ?>
 
    <?php
    if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
 
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
         
        <?php if ( has_post_thumbnail() ) { ?>
         
            <h2 class="entry-title desktop"><?php the_title(); ?></h2>
         
            <div class="quarter right"> 
                <?php the_post_thumbnail( 'large' ); ?>
            </div>
             
            <section class="entry-content three-quarters left">
                <h2 class="entry-title mobile"><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </section><!-- .entry-content -->
         
        <?php }
             
        else { ?>
         
            <h2 class="entry-title desktop"><?php the_title(); ?></h2>
     
            <section class="entry-content">
                <?php the_content(); ?>
            </section><!-- .entry-content -->   
             
        <?php } ?>
         
    </article><!-- #post-## -->
 
<?php endwhile; ?>
 
<?php get_footer(); ?>