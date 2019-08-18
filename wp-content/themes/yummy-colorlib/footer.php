<footer class="footer_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-content">
                        <!-- Logo Area Start -->
                        <div class="footer-logo-area text-center"> 
							<a href="<?php echo site_url(); ?>" class="yummy-logo">Merry Christmas</a>
                        </div>
                        <!-- Menu Area Start -->
                          <?php shailan_dropdown_menu( ); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Copywrite Text -->
                    <div class="copy_right_text text-center">
                        <p>Copyright @2018 All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
	
<?php wp_footer(); ?>

  <script>
   function popitup(url) 
   {
    newwindow=window.open(url,'name','height=300,width=650,screenX=400,screenY=350');
    if (window.focus) {newwindow.focus()}
    return false;
   }
   </script>

</body>
</html>