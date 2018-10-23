<?php 
	if (is_active_sidebar('sidebar-gallery')) :
			dynamic_sidebar('sidebar-gallery'); 
  else :
		_e( 'this is sidebar gallery','thienlinh');
	endif;
?>