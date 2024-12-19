<?php
return array (
  'installer' => 
  array (
    'id' => 'installer',
    'name' => 'Инсталлер',
    'description' => 'Install new apps from the Webasyst Store',
    'icon' => 
    array (
      48 => 'wa-apps/installer/img/installer.svg',
      24 => 'wa-apps/installer/img/installer.svg',
      16 => 'wa-apps/installer/img/installer.svg',
    ),
    'mobile' => false,
    'version' => '3.0.0',
    'critical' => '3.0.0',
    'system' => true,
    'vendor' => 'webasyst',
    'csrf' => true,
    'ui' => '2.0',
    'build' => 863,
    'img' => 'wa-apps/installer/img/installer.svg',
  ),
  'site' => 
  array (
    'id' => 'site',
    'name' => 'Сайт',
    'icon' => 
    array (
      48 => 'wa-apps/site/img/site512.png',
      24 => 'wa-apps/site/img/site512.png',
      16 => 'wa-apps/site/img/site512.png',
    ),
    'sash_color' => '#49a2e0',
    'frontend' => true,
    'version' => '2.6.2',
    'critical' => '2.6.0',
    'vendor' => 'webasyst',
    'system' => true,
    'rights' => true,
    'plugins' => true,
    'themes' => true,
    'pages' => true,
    'auth' => true,
    'csrf' => true,
    'my_account' => true,
    'build' => 307,
    'img' => 'wa-apps/site/img/site512.png',
    'ui' => '1.3',
  ),
  'team' => 
  array (
    'id' => 'team',
    'name' => 'Команда',
    'icon' => 
    array (
      48 => 'wa-apps/team/img/team.svg',
      24 => 'wa-apps/team/img/team.svg',
      16 => 'wa-apps/team/img/team.svg',
    ),
    'version' => '2.3.0',
    'vendor' => 'webasyst',
    'sash_color' => '#f0dc03',
    'system' => true,
    'rights' => true,
    'plugins' => true,
    'csrf' => true,
    'ui' => '2.0',
    'forcible_ui' => '1.3',
    'build' => 228,
    'img' => 'wa-apps/team/img/team.svg',
  ),
  'webasyst' => 
  array (
    'id' => 'webasyst',
    'name' => 'Вебасист',
    'prefix' => 'webasyst',
    'version' => '3.0.0',
    'critical' => '3.0.0',
    'vendor' => 'webasyst',
    'csrf' => true,
    'header_items' => 
    array (
      'settings' => 
      array (
        'icon' => 
        array (
          48 => 'wa-content/img/wa-settings/settings.svg',
        ),
        'name' => 'Настройки',
        'link' => 'settings',
        'rights' => 'backend',
        'img' => 'wa-content/img/wa-settings/settings.svg',
      ),
    ),
    'ui' => '2.0',
    'build' => 863,
    'icon' => 
    array (
    ),
  ),
);
