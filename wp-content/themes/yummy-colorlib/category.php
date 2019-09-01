<?php get_header(); ?>

<?php get_sidebar('single_page_header'); ?>



<section class="categories_area clearfix" id="category_section">
        <div class="container">
	
	     <?php if(category_description()):
				echo category_description(); ?> 
				<br/><hr class="style17"/>
		 <?php endif; ?>		
        </div>
		
    </section>
						
						
	





<?php get_sidebar('category_blog'); ?>

 
 

<?php get_footer() ?>




 