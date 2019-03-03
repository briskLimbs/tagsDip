<?php

global $database;

$table = 'tags_dip';
$columns = array(
    'id' => array('type' => 'int(1)', 'special' => 'primary'),
    'name' => array('type' => 'varchar(45)', 'special' => 'NOT NULL'),
    'value' => array('type' => 'text', 'special' => 'NOT NULL')
  );

$values = array(
  array('name' => 'header'),
  array('name' => 'footer')
);

$database->createTable($table, $columns);
$database->insertMulti($table, $values);