<?php  // Moodle configuration file

unset($CFG);
global $CFG;
$CFG = new stdClass();

$CFG->dbtype    = $_ENV['MOODLE_DBTYPE'] ?? 'mariadb';
$CFG->dblibrary = 'native';
$CFG->dbhost    = $_ENV['MOODLE_DBHOST'] ?? 'mariadb';
$CFG->dbname    = $_ENV['MOODLE_DBNAME'] ?? 'moodle';
$CFG->dbuser    = $_ENV['MOODLE_DBUSER'] ?? 'moodle';
$CFG->dbpass    = $_ENV['MOODLE_DBPASSWORD'] ?? 'change-this-db-password';
$CFG->prefix    = '';
$CFG->dboptions = array (
  'dbpersist' => 0,
  'dbport' => 3306,
  'dbsocket' => '',
  #'dbcollation' => 'utf8mb4_uca1400_ai_ci',
  'dbcollation' => 'utf8mb4_general_ci',
);

$CFG->wwwroot   = $_ENV['MOODLE_URL'] ?? 'http://localhost:8080';
$CFG->dataroot  = $_ENV['MOODLE_DATAROOT'] ?? '/var/www/moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 0777;

require_once(__DIR__ . '/lib/setup.php');

// There is no php closing tag in this file,
// it is intentional because it prevents trailing whitespace problems!
