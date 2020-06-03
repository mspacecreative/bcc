<?php 
/**
 * Remove Admin Menu Link to Theme Customizer
 */
add_action( 'admin_menu', function () {
    global $submenu;

    if ( isset( $submenu[ 'themes.php' ] ) ) {
        foreach ( $submenu[ 'themes.php' ] as $index => $menu_item ) {
            if ( in_array( array( 'Customize', 'Customizer', 'customize' ), $menu_item ) ) {
                unset( $submenu[ 'themes.php' ][ $index ] );
            }
        }
    }
});