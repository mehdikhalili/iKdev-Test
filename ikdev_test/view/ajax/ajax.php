<?php

require_once '../../modal/AdminDB.php';

$volume = $_POST['volume'];

$txt;

if (AdminDB::addVolume($volume)) {
  $txt = 1;
} else {
  $txt = 0;
}

echo $txt;