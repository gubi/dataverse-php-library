<?php
// header("Content-type: text/plain");
header("Content-type: application/json");
require_once("Request_handler.php");

Dataverse\Request_handler::set_api_key("<YOUR-API-KEY>");
Dataverse\Request_handler::set_server("https://apitest.dataverse.org");
$data = Metadata_blocks::get_all_metadata_info();

print_r($data);

?>
