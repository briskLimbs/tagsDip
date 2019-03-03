<?php

global $database;
$addons = new Addons();
$parameters['action'] = $action = isset($_GET['action']) ? $_GET['action'] : false;

$response = array();
$postAction = isset($_POST['dip']) ? $_POST['dip'] : false;
$data = isset($_POST['data']) ? $_POST['data'] : false;
$message = false;

switch ($postAction) {
  case 'css':
    if (writeCss($data)) {
      $message = 'CSS saved successully';
    }
    break;
  case 'js':
    if (writeJs($data)) {
      $message = 'JavaScript saved successully';
    }
    break;
  case 'header':
    if (writeHeader($data)) {
      $message = 'Code for < header > saved successully';
    }
    break;
  case 'footer':
    if (writeFooter($data)) {
      $message = 'Code for < footer > saved successully';
    }
    break;
  
  default:
    break;
}

switch ($action) {
  case 'css':
    $response = readCss();
    break;
  case 'js':
    $response = readJs();
    break;
  case 'header':
    $response = readHeader();
    break;
  case 'footer':
    $response = readFooter();
    break;
  
  default:
    break;
}

$parameters['message'] = $message;
$parameters['response'] = $response;
$parameters['_title'] = 'Custom ' . $action;
$parameters['mainSection'] = 'tags_dip';
# pex($parameters);
$addons->display(TAGS_DIP_NAME, 'pages/dip.html', $parameters);