{if $gBitSystem->isPackageActive( 'gallery2' ) }
	{bitmodule title="$moduleTitle" name="last_blog_posts"}
	
{php}
global $smarty, $gQueryUserId, $module_rows, $module_params, $gBitSystem;

	for( $i=0; $i < 4; $i++ ) {
		print '<div style="text-align:left;">';
		readfile( 'http://'.$_SERVER["HTTP_HOST"].GALLERY2_PKG_URL.'index.php?g2_view=imageblock:External&g2_blocks=randomImage&g2_show=title|owner|date' );
		print '</div>';
	}
{/php}

	{/bitmodule}
{/if}
