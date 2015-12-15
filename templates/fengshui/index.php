<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
require_once dirname(__FILE__) . DS . 'functions.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
 <head>
  <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<jdoc:include type="head" />
  <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/system.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/general.css" type="text/css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/template.css" />
  <!--[if IE 6]><link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/template.ie6.css" type="text/css" media="screen" /><![endif]-->
  <!--[if IE 7]><link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/template.ie7.css" type="text/css" media="screen" /><![endif]-->
  <script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/script.js"></script>
 </head>
<body>
    <div class="PageBackgroundGradient"></div>
<div class="PageBackgroundGlare">
    <div class="PageBackgroundGlareImage"></div>
</div>
<div class="Main">
<div class="Sheet">
    <div class="Sheet-tl"></div>
    <div class="Sheet-tr"></div>
    <div class="Sheet-bl"></div>
    <div class="Sheet-br"></div>
    <div class="Sheet-tc"></div>
    <div class="Sheet-bc"></div>
    <div class="Sheet-cl"></div>
    <div class="Sheet-cr"></div>
    <div class="Sheet-cc"></div>
    <div class="Sheet-body">
<jdoc:include type="modules" name="user3" />
<div class="Header">
    <div class="Header-jpeg"></div>
<div class="logo">
 <h1 id="name-text" class="logo-name"><a href="<?php echo $this->baseurl ?>/">FENG SHUI</a></h1>
</div>


</div>
<jdoc:include type="modules" name="banner1" style="xhtml" />
<?php echo artxPositions($this, array('top1', 'top2', 'top3'), 'artblock'); ?>
<div class="contentLayout">
<?php if ($this->countModules('left')) : ?>
<div class="sidebar1"><jdoc:include type="modules" name="left" style="artblock" />
</div>
<?php endif; ?>
<div class="<?php echo $this->countModules('left') ? 'content' : 'content-wide'; ?>">

<?php if ($this->countModules('breadcrumb')) : ?>
<?php endif; ?>
<jdoc:include type="modules" name="banner2" style="xhtml" />
<?php if ($this->countModules('breadcrumb')) : ?>
<div class="Post">
    <div class="Post-body">
<div class="Post-inner">
<div class="PostContent">
<jdoc:include type="modules" name="breadcrumb" />
</div>
<div class="cleared"></div>

</div>

    </div>
</div>
<?php endif; ?>
<?php echo artxPositions($this, array('user1', 'user2'), 'artpost'); ?>
<jdoc:include type="modules" name="banner3" style="xhtml" />
<?php if (artxHasMessages()) : ?><div class="Post">
    <div class="Post-body">
<div class="Post-inner">
<div class="PostContent">

<jdoc:include type="message" />

</div>
<div class="cleared"></div>

</div>

    </div>
</div>
<?php endif; ?>
<jdoc:include type="component" />
<jdoc:include type="modules" name="banner4" style="xhtml" />
<?php echo artxPositions($this, array('user4', 'user5'), 'artpost'); ?>
<jdoc:include type="modules" name="banner5" style="xhtml" />
</div>

</div>
<div class="cleared"></div>

<?php echo artxPositions($this, array('bottom1', 'bottom2', 'bottom3'), 'artblock'); ?>
<jdoc:include type="modules" name="banner6" style="xhtml" />
<div class="Footer">
 <div class="Footer-inner">
  <jdoc:include type="modules" name="syndicate" />
  <div class="Footer-text">
  <?php if ($this->countModules('copyright') == 0): ?>
<p>Copyright &copy; 2009 ---.<br/>
All Rights Reserved.</p>

  <?php else: ?>
  <jdoc:include type="modules" name="copyright" style="xhtml" />
  <?php endif; ?>
  </div>
 </div>
 <div class="Footer-background"></div>
</div>

    </div>
</div>
<div class="cleared"></div>
<p class="page-footer"><a href="http://www.artisteer.com/?p=joomla_templates">Joomla template</a> created with Artisteer by <a href="http://www.cms-studio.de">Brigitte Doll</a>.</p>
</div>

</body> 
</html>