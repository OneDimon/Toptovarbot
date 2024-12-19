<?php
return array (
  'id' => 
  array (
    'type' => 'int',
    'null' => 0,
    'autoincrement' => 1,
  ),
  'contact_id' => 
  array (
    'type' => 'int',
    'null' => 0,
  ),
  'field' => 
  array (
    'type' => 'varchar',
    'params' => '32',
    'null' => 0,
  ),
  'ext' => 
  array (
    'type' => 'varchar',
    'params' => '32',
    'null' => 0,
    'default' => '',
  ),
  'value' => 
  array (
    'type' => 'varchar',
    'params' => '255',
    'null' => 0,
  ),
  'sort' => 
  array (
    'type' => 'int',
    'null' => 0,
    'default' => '0',
  ),
  'status' => 
  array (
    'type' => 'varchar',
    'params' => '255',
  ),
);
