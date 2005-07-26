<?php

	require_once( '../bit_setup_inc.php' );

	if (!file_exists( 'embed.php' )) {
		$lines = file( "README." );
		foreach ( $lines as $lineno => $line ) {
			echo htmlspecialchars( $line ) . "<br />\n";
		}
	} else {
		require_once( 'embed.php' );
		$activeUserId = $gBitUser->isRegistered() ? $gBitUser->mUserId : NULL;
		$status = GalleryEmbed::init( array( 'embedUri' => 'index.php', 'relativeG2Path' => '', 'loginRedirect' => '/users/login.php', 'activeUserId' => $activeUserId ));
		$gallerySessionId = GalleryEmbed::getSessionId();
//print "	$status = GalleryEmbed::init( array( 'embedUri' => 'index.php', 'relativeG2Path' => '', 'loginRedirect' => '/users/login.php', 'activeUserId' => $activeUserId ))";

		if ($status->isError()) {
			if( $status->getErrorCode() & ERROR_MISSING_OBJECT ) {
//vd( $gBitUser->mUserId );
//vd( $gallery->getActiveUserId() );
				if( $g2User = GalleryEmbed::createUser( $gBitUser->mUserId, array( 
					'username' => $gBitUser->mInfo['login'],
					'email' => $gBitUser->mInfo['email'],
					'fullname' => $gBitUser->mInfo['real_name'],
					'creationtimestamp' => $gBitUser->mInfo['registration_date']
				) ) ) {
					if( $gBitUser->isAdmin() ) {
						list ($ret, $adminGroupId) = GalleryCoreApi::getPluginParameter('module', 'core', 'id.adminGroup');
						if ($ret->isError()) {
							return array($ret->wrap(__FILE__, __LINE__), false);
						}
						GalleryEmbed::addUserToGroup( $activeUserId, 2 );
					}
	//'language' => $gBitUser->mInfo['language'],
	//'password' => string,
	//'hashedpassword' => string,
	//'hashmethod' => string,
				} else {
					fatalError( $status->getAsHtml() );
					exit;
				}
			}
		}
 
		GalleryCapabilities::set('showSidebar', TRUE);
		$g2data = GalleryEmbed::handleRequest();
		//After enabling sidebar, no need to smarty menu and it is not working as of 2005 06 17
		//$gBitSmarty->assign_by_ref( 'menuLinks', $g2data['layoutData']['itemLinks'] );

		if ($g2data['isDone']) {
			exit; // G2 has already sent output (redirect or binary data)
		}
	$GLOBALS['ADODB_FETCH_MODE'] = ADODB_FETCH_ASSOC;

		$gBitSmarty->assign_by_ref( 'g2data', $g2data );
		$gBitSystem->display( 'bitpackage:gallery2/bitweaver_embed.tpl' );  
	}
?>
