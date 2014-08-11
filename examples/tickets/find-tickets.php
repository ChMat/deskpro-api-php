<?php
/*
 * This example demonstrates how to find tickets in the database.
 *
 * In this example, we are using the Department field and the Agent field
 * to find all tickets assigned to a particular agent that are in a
 * particular department.
 */

require __DIR__.'/../../deskpro-api.php';

$deskpro_url   = 'http://example.com/deskpro';   // The URL to your helpdesk
$api_key       = '123:XYZ';                      // Your API key (Admin > Apps > API Keys)
$department_id = 2;                              // The department to search for
$agent_id      = 1;                              // The agent to search for

// First, create the API object
$api = new \DeskPRO\Api($deskpro_url, $api_key);

// Then we need to build our list of criteria
$criteria = $api->tickets->createCriteria()
	->addAgent($agent_id)
	->addDepartment($department_id);

// Then we can get our results
$result = $api->tickets->find($criteria);

if (!$result->isError()) {
	$data = $result->getData();
	print_r($data);
} else {
	echo $result->getResponseCode() . ' ' . $result->getResponseCodeAsText();
}