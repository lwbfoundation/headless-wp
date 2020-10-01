<?php

function getNewURL() {
	$requestURI = $_SERVER['REQUEST_URI'];
	if ($requestURI == "/" || $requestURI == "") {
		return "/wp-admin";
	} else {
		$baseURL = get_option( 'headlesswp_setting_name' );
		return $baseURL . $requestURI;
	}
}

$newURL = getNewURL();

/**
 * @param $url
 * @param int $statusCode
 * Primary way to redirect front-end visitors away from this URL...but there are backups. -JMS
 */
function redirect( $url, $statusCode = 303 ) {
	header( 'Location: ' . $url, true, $statusCode );
	die();
}
redirect( $newURL, 301 );

?>
<meta content="0;url=<?php echo $newURL; ?>" http-equiv"refresh">

<script type="text/javascript">
	window.location = '<?php echo $newURL; ?>';
</script>
