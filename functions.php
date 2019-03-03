<?php

function writeCss($css) {
  return file_put_contents(__DIR__ . '/dip.css', $css);
}

function writeJs($js) {
  return file_put_contents(__DIR__ . '/dip.js', $js);
}

function writeHeader($code) {
  global $database;
  $database->where('name', 'header');
  return $database->update('tags_dip', array('value' => $code));
}

function writeFooter($code) {
  global $database;
  $database->where('name', 'footer');
  return $database->update('tags_dip', array('value' => $code));
}

function readCss() {
  return file_get_contents(__DIR__ . '/dip.css');
}

function readJs() {
  return file_get_contents(__DIR__ . '/dip.js');
}

function readValue($name) {
  global $database;
  $database->where('name', $name);
  return $database->get('tags_dip', null, array('value'))['0']['value'];
}

function readHeader() {
  return readValue('header');
}

function readFooter() {
  return readValue('footer');
}

function customCss() {
  echo linkTag(TAGS_DIP_URL . '/dip.css');
}

function customJs() {
  echo linkTag(TAGS_DIP_URL . '/dip.js');
}

function customHeader() {
  echo readHeader();
}

function customFooter() {
  echo readFooter();
}