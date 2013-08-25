<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$required_fields = array('id', 'first_name', 'last_name', 'email_address', 'username', 'created_at', 'updated_at');

// index test

$browser = new sfTestFunctional(new sfBrowser());
$browser->get('/users')->
  with('request')->begin()->
    isParameter('module', 'users')->
    isParameter('action', 'list')->
  end();

$response = $browser->getResponse();
$browser->test()->is($response->getHttpHeader('content-type'), 'application/json');

$content = $response->getContent();
$decoded = json_decode($content, true);
$browser->test()->is(isset($decoded['objects']), true);
foreach($decoded['objects'] as $user)
    foreach($required_fields as $field)
        $browser->test()->is(isset($user[$field]), true, $field);

// show test

$browser = new sfTestFunctional(new sfBrowser());
$browser->get('/users/1')->
  with('request')->begin()->
    isParameter('module', 'users')->
    isParameter('action', 'show')->
    isParameter('id', '1')->
  end();

$response = $browser->getResponse();
$browser->test()->is($response->getHttpHeader('content-type'), 'application/json');

$content = $response->getContent();
$browser->test()->is($content, '{"id":1,"first_name":"b","last_name":"s","email_address":"bs","username":"bs","created_at":"2011-10-18 19:22:26","updated_at":"2013-08-24 16:15:38"}');

$decoded = json_decode($content, true);
foreach($required_fields as $field)
    $browser->test()->is(isset($decoded[$field]), true, $field);
