<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

 /**
 * The Template for displaying all single posts.
 *
 * @package Sampression-Lite
 * @since Sampression Lite 1.0
 */
 
get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <nav id="nav-above" class="post-navigation clearfix columns nine">
            <h3 class="assistive-text hidden"><?php _e( 'Post navigation', 'sampression' ); ?></h3>
            <div class="nav-previous alignleft"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'sampression' ) ); ?></div>
            <div class="nav-next alignright"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'sampression' ) ); ?></div>
        </nav><!-- #nav-above -->
                    
        
        <section id="content" class="columns nine" role="main">
		
		<article <?php post_class('post'); ?> id="post-<?php the_ID(); ?>">
			
		<?php if ( has_post_thumbnail() ) { ?>
            <div class="featured-img">
            	<?php the_post_thumbnail( 'featured' ); ?>
            </div>
            <!-- .featured-img -->
        <?php } ?>
            
            <header class="post-header">
				<h2 class="post-title"><?php the_title(); ?></h2>
			</header>
            
            <div class="meta clearfix">
            
					<?php
                printf( __( '<time class="col posted-on genericon-day" datetime="2011-09-28">%2$s</time> ', 'sampression' ),'meta-prep meta-prep-author',
					sprintf( '<a href="%4$s" title="%2$s" rel="bookmark">%3$s</a>',
						get_permalink(),
						esc_attr( get_the_time() ),
						get_the_date('M d, Y'),
						get_month_link( get_the_time('Y'), get_the_time('m'))
					));
            ?>
	            <?php if ( comments_open() && get_comments_number() > 0 ) : ?>
	            <div class="col count-comment genericon-comment">
	            <?php comments_popup_link(__('No comments yet', 'sampression'), __('1 Comment', 'sampression'), __('% Comments', 'sampression')); ?>
	            </div>
	         <?php endif; ?>
	         <?php printf( '<div class="post-author genericon-user col"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></div>',
	            get_author_posts_url( get_the_author_meta( 'ID' ) ),
	          sprintf( esc_attr__( 'View all posts by %s', 'sampression' ), get_the_author() ),
	            get_the_author()
            ); ?>
				
				<div class="cats genericon-category"><?php printf(__('%s', 'sampression'), get_the_category_list(', ')); ?></div>
				
				<?php if(has_tag()) {?>
						<div class="tags genericon-tag"><?php the_tags(' ', ', '); ?> </div>
				<?php } ?>
			
				<?php if(is_user_logged_in()){ ?>
			  
				<div class="edit genericon-edit"><?php edit_post_link( __( 'Edit', 'sampression' ) ); ?> </div>
			  
				<?php } ?>
            
            </div>
            <!-- .meta -->
            
            <div class="entry clearfix">
				<?php the_content(); ?>
                
                <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'sampression' ) . '</span>', 'after' => '</div>' ) ); ?>
            </div>
            
		</article><!-- .post -->
        
				<?php comments_template( '', true ); ?>
        
        </section><!-- #content -->
		
		<?php endwhile; endif; ?>
	
	<?php get_sidebar('right'); ?>

<?php get_footer(); ?>