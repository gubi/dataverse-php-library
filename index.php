<?php
// header("Content-type: text/plain");
header("Content-type: application/json");
require_once("Request_handler.php");

Request_handler::set_api_key("<YOUR-API-KEY>");
Request_handler::set_server("https://dataverse.harvard.edu");
$data = Metadata_blocks::get_all_metadata_info();

print_r($data);

?>
