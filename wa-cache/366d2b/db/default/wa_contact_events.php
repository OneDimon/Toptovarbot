<?php
return array (
  'id' => 
  array (
    'type' => 'int',
    'null' => 0,
    'autoincrement' => 1,
  ),
  'uid' => 
  array (
    'type' => 'varchar',
    'params' => '255',
  ),
  'create_datetime' => 
  array (
    'type' => 'datetime',
    'null' => 0,
  ),
  'update_datetime' => 
  array (
    'type' => 'datetime',
    'null' => 0,
  ),
  'contact_id' => 
  array (
    'type' => 'int',
    'null' => 0,
  ),
  'calendar_id' => 
  array (
    'type' => 'int',
    'null' => 0,
  ),
  'summary' => 
  array (
    'type' => 'varchar',
    'params' => '255',
    'null' => 0,
  ),
  'description' => 
  array (
    'type' => 'text',
  ),
  'location' => 
  array (
    'type' => 'varchar',
    'params' => '255',
  ),
  'start' => 
  array (
    'type' => 'datetime',
    'null' => 0,
  ),
  'end' => 
  array (
    'type' => 'datetime',
    'null' => 0,
  ),
  'is_allday' => 
  array (
    'type' => 'tinyint',
    'null' => 0,
    'default' => '0',
  ),
  'is_status' => 
  array (
    'type' => 'tinyint',
    'null' => 0,
    'default' => '0',
  ),
  'sequence' => 
  array (
    'type' => 'int',
    'null' => 0,
    'default' => '0',
  ),
);
