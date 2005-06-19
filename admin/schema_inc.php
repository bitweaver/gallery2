<?php
global $gBitInstaller;
$gBitInstaller->registerPackageInfo( 'gallery2', array(
	'description' => "Gallery 2 is a very advanced image gallery program, which has a multitude of features including automatic thumbnail creation, image resizing, rotation, captioning and more.",
	'version' => '2.something',
	'state' => 'external package',
	'dependencies' => '',
	'install' => array(
		'package' => 'gallery2',
		'file' => 'install/index.php'
	)
) );
?>
