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