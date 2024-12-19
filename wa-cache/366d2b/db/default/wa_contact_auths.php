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
  'session_id' => 
  array (
    'type' => 'varchar',
    'params' => '255',
    'null' => 0,
  ),
  'token' => 
  array (
    'type' => 'varchar',
    'params' => '42',
    'null' => 0,
  ),
  'login_datetime' => 
  array (
    'type' => 'datetime',
  ),
  'last_datetime' => 
  array (
    'type' => 'datetime',
  ),
  'user_agent' => 
  array (
    'type' => 'varchar',
    'params' => '255',
  ),
);
