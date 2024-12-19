<?php
return array (
  'id' => 
  array (
    'type' => 'int',
    'null' => 0,
    'autoincrement' => 1,
  ),
  'name' => 
  array (
    'type' => 'varchar',
    'params' => '255',
    'null' => 0,
  ),
  'cnt' => 
  array (
    'type' => 'int',
    'null' => 0,
    'default' => '0',
  ),
  'icon' => 
  array (
    'type' => 'varchar',
    'params' => '255',
  ),
  'sort' => 
  array (
    'type' => 'int',
  ),
  'type' => 
  array (
    'type' => 'enum',
    'params' => '\'group\',\'location\'',
    'null' => 0,
    'default' => 'group',
  ),
  'description' => 
  array (
    'type' => 'text',
  ),
);
