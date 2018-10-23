<?php 
	if (is_active_sidebar('sidebar-first')) :
			dynamic_sidebar('sidebar-first'); 
  else :
		_e( 'this is sidebar first','thienlinh');
	endif;
?>