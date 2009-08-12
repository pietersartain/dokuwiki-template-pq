<?php 
/**
 * DokuWiki Sidebar Template
 * @author Christopher Smith <chris@jalakai.co.uk>
 *
 * This template is the Dokuwiki Default Template with
 * a few alterations
 *
 * @link   http://wiki.splitbrain.org/wiki:tpl:templates
 * @author Andreas Gohr <andi@splitbrain.org>
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

// include functions that provide sidebar functionality
@require_once(dirname(__FILE__).'/tplfn_sidebar.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>"
 lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction']?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script src="http://www.wowhead.com/widgets/power.js"></script>
  <title>
    <?php tpl_pagetitle()?>
    [<?php echo strip_tags($conf['title'])?>]
  </title>

  <?php tpl_metaheaders()?>

  <link rel="shortcut icon" href="<?php echo DOKU_TPL?>images/favicon.ico" />

  <?php /*old includehook*/ @include(dirname(__FILE__).'/meta.html')?>
</head>

<body<?php if (tpl_getConf('enable')) echo " class='$sidebar_class'"; ?>>
<?php
/*old includehook*/ 
@include(dirname(__FILE__).'/topheader.html');

/* online/offline show */
$addr = explode(".",$_SERVER['SERVER_NAME']);
if ($addr[1] != 'pesartain') {
	echo "<div style='border: 1px solid red; background: pink; color: black; text-align: center; font-size: 200%; font-weight: bold;'>
		DEVELOPMENT
	</div>";
}
?>
<div class="dokuwiki">
  <?php html_msgarea()?>

  <div class="stylehead">

    <div class="header">
	  <div class="cards">
	    <img src="<?php echo DOKU_TPL; ?>images/cards150x150.png"></img>
	  </div>
      <div class="logo">
		<?php echo $conf['title'];?>
      </div>
    </div>
    <div class="blackline"></div>
    <div class="belowline">
      <div class="pagebuttons">
		<?php tpl_actionlink('recent','','','Site changes')?> &#149; 
		<?php tpl_actionlink('index','','','Site index')?> &#149;
		<?php tpl_actionlink('edit','','','Edit page')?> &#149; 
		<?php tpl_actionlink('history','','','Page revisions')?>
      </div>
      <div class="pagename">
   	    [[<?php tpl_link(wl($ID,'do=backlink'),tpl_pagename($ID)) ?>]]
  	  </div>
    </div>
    <div class="clearer"></div>

    <?php /*old includehook*/ @include(dirname(__FILE__).'/header.html')?>

    <?php if($conf['breadcrumbs']){?>
    <div class="breadcrumbs">
      <?php tpl_breadcrumbs()?>
      <?php //tpl_youarehere() //(some people prefer this)?>
    </div>
    <?php }?>

    <?php if($conf['youarehere']){?>
    <div class="breadcrumbs">
      <?php tpl_youarehere() ?>
    </div>
    <?php }?>

  </div>
  <?php flush()?>

  <?php /*old includehook*/ @include(dirname(__FILE__).'/pageheader.html')?>

  <div class="page">
    <!-- wikipage start -->
    <?php tpl_content()?>
    <!-- wikipage stop -->
  </div>

<?php if (tpl_getConf('enable')) { ?>
  <div id="sidebar">
    <div id="sidebartop"><?php tpl_sidebar_editbtn(); ?> &nbsp;</div>
    <div id="sidebar_content">
      <?php tpl_sidebar_content(); ?>
    </div>
		<hr>
	<div id="sidebar_pagelinks">
		<?php tpl_userinfo()?><br />
        <?php tpl_actionlink('profile')?><br />
        <?php tpl_actionlink('login')?><br />
		
        <?php tpl_actionlink('admin')?><br />
		<br /><br />
		<?php tpl_actionlink('subscription')?>
	 </div>
  </div>
<?php } ?>

  <div class="clearer">&nbsp;</div>

  <?php flush()?>

  <div class="doc"><?php tpl_pageinfo()?></div>

<!--
  <div class="stylefoot">

    <div class="meta">
      <div class="user">
        <?php tpl_userinfo()?>
      </div>
    </div>

   <?php /*old includehook*/ @include(dirname(__FILE__).'/pagefooter.html')?>

  </div>
-->
</div>

<?php /*old includehook*/ @include(dirname(__FILE__).'/footer.html')?>

<div class="no"><?php tpl_indexerWebBug()?></div>

</body>
</html>
