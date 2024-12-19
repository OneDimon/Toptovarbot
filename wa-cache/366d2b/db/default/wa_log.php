<?php
return array (
  'id' => 
  array (
    'type' => 'bigint',
    'null' => 0,
    'autoincrement' => 1,
  ),
  'app_id' => 
  array (
    'type' => 'varchar',
    'params' => '32',
    'null' => 0,
  ),
  'contact_id' => 
  array (
    'type' => 'int',
    'null' => 0,
  ),
  'datetime' => 
  array (
    'type' => 'datetime',
    'null' => 0,
  ),
  'action' => 
  array (
    'type' => 'varchar',
    'params' => '255',
    'null' => 0,
  ),
  'subject_contact_id' => 
  array (
    'type' => 'int',
  ),
  'params' => 
  array (
    'type' => 'text',
  ),
);
