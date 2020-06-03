<?php 
add_action( 'admin_menu', function () {
global $submenu;
if ( isset( $submenu[ 'themes.php' ] ) ) {
    foreach ( $submenu[ 'themes.php' ] as $index => $menu_item ) {
        foreach ($menu_item as $value) {
            if (strpos($value,'customize') !== false) {
                unset( $submenu[ 'themes.php' ][ $index ] );
            }
        }
    }
}
});

function remove_menus(){
	remove_menu_page( 'index.php' ); // Dashboard
	remove_menu_page( 'tools.php' ); //Tools
	remove_menu_page( 'options-general.php' ); //Settings remove_menu_page( 'wpcf7' ); //contact form
} 
if (current_user_can( 'editor' )) { 
	add_action( 'admin_menu', 'remove_menus' ); 
}