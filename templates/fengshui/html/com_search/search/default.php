<?php
if (!defined('_JEXEC')) exit('Restricted access'); // no direct access
require_once dirname(__FILE__) . DS . '..' . DS . '..' . DS . '..' . DS . 'functions.php';
ob_start();
echo $this->loadTemplate('form');
if(!$this->error && count($this->results) > 0)
	echo $this->loadTemplate('results');
else
	echo $this->loadTemplate('error');
echo artxPost(artxPageTitle($this), ob_get_clean());