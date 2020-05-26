<?php 
add_filter('relevanssi_modify_wp_query', 'rlv_remove_polylang');
function rlv_remove_polylang($q) {
	$q->tax_query = "";
	$q->set('taxonomy', null);
	$q->set('term', null);
	return $q;
}