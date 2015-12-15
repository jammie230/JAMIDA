<?php
defined('_JEXEC') or die('Restricted access');
?>
<?php echo '<?xml version="1.0" encoding="utf-8"?'.'>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
	<jdoc:include type="head" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/uj_realestate/css/template.css" type="text/css" />
<!--[if lt IE 7]>
<style type="text/css">
img, div, li, a { behavior: url(<?php echo $this->baseurl ?>/templates/uj_realestate/images/iepngfix.htc) }
</style> 
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/uj_realestate/images/iepngfix_tilebg.js"></script>  
<![endif]-->
</head>
<body>
<div class="uj_wrap">
  <div class="uj_header">
    <div class="uj_logo"></div>
    <div class="uj_search">
      <jdoc:include type="modules" name="search"  style="xhtml"/>
    </div>
    <div class="uj_menu">
      <jdoc:include type="modules" name="menu"  style="xhtml"/>
    </div>
  </div>
  <div class="uj_content">  
    <div class="uj_left">
      <jdoc:include type="modules" name="left" style="xhtml" />
    </div>
    <div class="uj_main">
      <div class="uj_breadcrumb">
        <jdoc:include type="modules" name="breadcrumb" style="xhtml" />
      </div> 
      <jdoc:include type="component" style="xhtml" />
    </div>
  </div>
  <div class="uj_bottom">
    <div class="uj_bottom_inner">
      <div class="uj_user1">
        <jdoc:include type="modules" name="user1" style="xhtml" />
      </div>
      <div class="uj_user2">
        <jdoc:include type="modules" name="user2" style="xhtml" />
      </div>
      <div class="uj_user3">
        <jdoc:include type="modules" name="user3" style="xhtml" />
      </div>
    </div>
  </div>
  <div class="uj_footer">
    <jdoc:include type="modules" name="footer" style="xhtml" />
    Template created by <a href="http://www.ultijoomla.com">Ulti Joomla</a>
  </div>
</div>
</body>
</html>