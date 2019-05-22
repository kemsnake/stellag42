<!DOCTYPE html>
<html>
<head>
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<?php print $styles; ?>
<?php print $scripts; ?>
<!--[if IE 8 ]>    <html class="ie8 ielt9"> <![endif]-->
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  <link rel="icon" href=​"xn--http://42-6yhvzk5ep0c7at.xn--/favicon-4bh4b.png" type="image/png">
</head>
<body class="<?php print $classes; ?>"<?php print $attributes; ?>>
	<div id="skip-link">
		<a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
	</div>
  	<?php print $page_top; ?>
	<?php print $page; ?>
	<?php print $page_bottom; ?>
</body>
</html>