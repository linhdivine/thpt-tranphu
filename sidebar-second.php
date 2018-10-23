<?php 
	dynamic_sidebar('sidebar-second'); 
?>
<?php 
	if (is_active_sidebar('sidebar-second')) :
			dynamic_sidebar('sidebar-second'); 
  else :
		_e( 'this is sidebar second','thienlinh');
	endif;
?>