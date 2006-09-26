<?php
global $gBitSystem;

$registerHash = array(
	'package_name' => 'gallery2',
	'package_path' => dirname( __FILE__ ).'/',
);
$gBitSystem->registerPackage( $registerHash );

if( $gBitSystem->isPackageActive( 'gallery2' ) ) {
	$menuHash = array(
		'package_name'  => GALLERY2_PKG_NAME,
		'index_url'     => GALLERY2_PKG_URL.'index.php',
		'menu_template' => 'bitpackage:gallery2/menu_gallery2.tpl',
	);
	$gBitSystem->registerAppMenu( $menuHash );
}
?>
