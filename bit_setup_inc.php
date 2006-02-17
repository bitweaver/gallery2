<?php
global $gBitSystem;

$registerHash = array(
	'package_name' => 'gallery2',
	'package_path' => dirname( __FILE__ ).'/',
);
$gBitSystem->registerPackage( $registerHash );

if( $gBitSystem->isPackageActive( 'gallery2' ) ) {
	$gBitSystem->registerAppMenu( GALLERY2_PKG_NAME, ucfirst( GALLERY2_PKG_DIR ), GALLERY2_PKG_URL.'index.php', 'bitpackage:gallery2/menu_gallery2.tpl', 'gallery2' );
}
?>
