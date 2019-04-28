<?php

require 'functions.php';
$addons = new Addons();

define('TAGS_DIP_PATH', __DIR__);
define('TAGS_DIP_NAME', basename(TAGS_DIP_PATH));
define('TAGS_DIP_URL', $addons->url(TAGS_DIP_NAME));

$pages = TAGS_DIP_NAME . '/pages';
$menu = array(
  'tags_dip' => array(
    'display_name' => 'TagsDip',
    'sub' => array(
      'Custom CSS' => $pages . '/dip.php&action=css',
      'Custom JS' => $pages . '/dip.php&action=js',
      'Custom Header' => $pages . '/dip.php&action=header',
      'Custom Footer' => $pages . '/dip.php&action=footer'
    )
  )
);

$addons->addMenu($menu);

$addons->addTrigger('customCss', 'head_end');
$addons->addTrigger('customHeader', 'head_end');
$addons->addTrigger('customJs', 'footer_end');
$addons->addTrigger('customFooter', 'footer_end');