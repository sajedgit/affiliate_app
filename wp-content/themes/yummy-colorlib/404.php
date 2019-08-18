<?php get_header(); ?>

<?php //get_sidebar('single_page_header'); ?>

	<section class="single_blog_area section_padding_80">
			<div class="container">

			
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', '' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyseventeen' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</div>
	</section>
	

<?php get_footer();
