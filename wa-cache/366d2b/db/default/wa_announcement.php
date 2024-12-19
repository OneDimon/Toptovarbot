<?php
return array (
  'id' => 
  array (
    'type' => 'int',
    'null' => 0,
    'autoincrement' => 1,
  ),
  'app_id' => 
  array (
    'type' => 'varchar',
    'params' => '32',
    'null' => 0,
  ),
  'type' => 
  array (
    'type' => 'varchar',
    'params' => '32',
  ),
  'contact_id' => 
  array (
    'type' => 'int',
  ),
  'text' => 
  array (
    'type' => 'text',
    'null' => 0,
  ),
  'data' => 
  array (
    'type' => 'text',
  ),
  'datetime' => 
  array (
    'type' => 'datetime',
    'null' => 0,
  ),
  'ttl_datetime' => 
  array (
    'type' => 'datetime',
  ),
  'is_pinned' => 
  array (
    'type' => 'tinyint',
    'null' => 0,
    'default' => '0',
  ),
  'access' => 
  array (
    'type' => 'enum',
    'params' => '\'all\',\'limited\'',
    'null' => 0,
    'default' => 'all',
  ),
);
