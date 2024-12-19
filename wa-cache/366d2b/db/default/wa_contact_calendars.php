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
  'bg_color' => 
  array (
    'type' => 'varchar',
    'params' => '7',
  ),
  'font_color' => 
  array (
    'type' => 'varchar',
    'params' => '7',
  ),
  'status_bg_color' => 
  array (
    'type' => 'varchar',
    'params' => '7',
  ),
  'status_font_color' => 
  array (
    'type' => 'varchar',
    'params' => '7',
  ),
  'icon' => 
  array (
    'type' => 'varchar',
    'params' => '255',
  ),
  'sort' => 
  array (
    'type' => 'int',
    'null' => 0,
    'default' => '0',
  ),
  'is_limited' => 
  array (
    'type' => 'tinyint',
    'params' => '1',
    'null' => 0,
    'default' => '0',
  ),
  'default_status' => 
  array (
    'type' => 'varchar',
    'params' => '255',
  ),
);
