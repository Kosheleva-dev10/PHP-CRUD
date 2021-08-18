<?php
 
// DATABASE connection script  
 
// database Connection variables
define('HOST', 'localhost'); // Database host name ex. localhost
define('USER', 'root'); // Database user. ex. root ( if your on local server)
define('PASSWORD', ''); // Database user password  (if password is not set for user then keep it empty )
define('DATABASE', 'techktdb_gmafund'); // Database name
define('CHARSET', 'utf8');
 
function DB()
{
    static $instance;
    if ($instance === null) {
       /** $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => FALSE,
        );*/
        //$dsn = 'mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=' . CHARSET;
        //$instance = new PDO($dsn, USER, PASSWORD, $opt);

try {
        $instance = new PDO('mysql:host=localhost;dbname=techktdb_gmafund','root',
                              '');
}
catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        exit;
    }
    }
    return $instance;
}
 
?>