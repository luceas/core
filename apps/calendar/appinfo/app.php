<?php
$l=new OC_L10N('calendar');
OC::$CLASSPATH['OC_Calendar_Calendar'] = 'apps/calendar/lib/calendar.php';
OC::$CLASSPATH['OC_Calendar_Hooks'] = 'apps/calendar/lib/hooks.php';
OC::$CLASSPATH['OC_Connector_Sabre_CalDAV'] = 'apps/calendar/lib/connector_sabre.php';
OC_HOOK::connect('OC_User', 'post_createUser', 'OC_Calendar_Hooks', 'deleteUser');

OC_App::register( array( 
  'order' => 10,
  'id' => 'calendar',
  'name' => 'Calendar' ));

OC_App::addNavigationEntry( array( 
  'id' => 'calendar_index',
  'order' => 10,
  'href' => OC_Helper::linkTo( 'calendar', 'index.php' ),
  'icon' => OC_Helper::imagePath( 'calendar', 'icon.png' ),
  'name' => $l->t('Calendar')));

OC_App::registerPersonal('calendar', 'settings');
