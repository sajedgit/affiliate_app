


<div class="row">
	<div class="col-12" id="main-nav">

		
 
    <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => '')); ?>
 


	</div>
</div>




<style>

#main-nav   {
    height: 30px; /* set to the height you want your menu to be */
    margin: 0 0 0px; /* just to give some spacing */
}
#main-nav ul    {
    margin: 0; padding: 0; /* only needed if you have not done a CSS reset */
}
#main-nav li    {
    display: block;
    float: left;
    line-height: 30px; /* this should be the same as your #main-nav height */
    height: 30px; /* this should be the same as your #main-nav height */
    margin: 0; padding: 0; /* only needed if you don't have a reset */
    position: relative; /* this is needed in order to position sub menus */
}
#main-nav li a  {
    display: block;
    height: 30px;
    line-height: 30px;
    padding: 0 15px;
}
#main-nav .current-menu-item a, #main-nav .current_page_item a, #main-nav a:hover {
    color: #000;
    background: #ccc;
}
#main-nav ul ul { /* this targets all sub menus */
    display: none; /* hide all sub menus from view */
    position: absolute;
    top: 30px; /* this should be the same height as the top level menu -- height + padding + borders */
}
#main-nav ul ul li { /* this targets all submenu items */
    float: none; /* overwriting our float up above */
    width: 150px; /* set to the width you want your sub menus to be. This needs to match the value we set below */
}
#main-nav ul ul li a { /* target all sub menu item links */
    padding: 5px 10px; /* give our sub menu links a nice button feel */
}
#main-nav ul li:hover > ul {
    display: block; /* show sub menus when hovering over a parent */
}

#main-nav ul ul li ul {
    /* target all second, third, and deeper level sub menus */
    left: 150px; /* this needs to match the sub menu width set above -- width + padding + borders */
    top: 0; /* this ensures the sub menu starts in line with its parent item */
}

</style>