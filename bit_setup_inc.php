<?php
global $gBitSystem;

$gBitSystem->registerPackage( 'gallery2', dirname( __FILE__ ).'/' );
if( $gBitSystem->isPackageActive( 'gallery2' ) ) {
	$gBitSystem->registerAppMenu( GALLERY2_PKG_NAME, ucfirst( GALLERY2_PKG_DIR ), GALLERY2_PKG_URL.'index.php', 'bitpackage:gallery2/menu_gallery2.tpl', 'gallery2' );
}
?>
