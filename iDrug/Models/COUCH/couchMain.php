<?php
$couch_dsn = "http://sieradzk1u:couchDB2A@couchdb.telecomnancy.univ-lorraine.fr/";
$couch_db = "orphadatabase";

require_once "couch.php";
require_once "couchClient.php";
require_once "couchDocument.php";


$client = new couchClient($couch_dsn,$couch_db);
$all_docs_db2 = $client->getAllDocs();

?>
