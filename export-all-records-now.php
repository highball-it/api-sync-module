<?php
use REDCap;

$recordIdFieldName = $module->getRecordIdField();
$records = json_decode(REDCap::getData($module->getProjectId(), 'json', null, $recordIdFieldName), true);

foreach($records as $record){
	$recordId = $record[$recordIdFieldName];
	$module->queueForUpdate($recordId);
}

require_once __DIR__ . '/export-now.php';