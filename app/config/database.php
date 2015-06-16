<?php
/** Development Environment **/
// when Set to false, no error will be throw out, but saved in temp/log.txt file.
	    define ('DEVELOPMENT_ENVIRONMENT',true); 
	    /** Site Root **/
   // Domain name of the site (no slash at the end!)
   //define('SITE_ROOT' , 'http://You domain name');
   define('SITE_ROOT' , 'http://127.0.0.1');
   define ('DEFAULT_CONTROLLER', "index");
   define ('DEFAULT_ACTION', "index");
   
   define('DB_TYPE','mysql');
   define('DB_HOST','localhost');
   define('DB_NAME','sandwicheriadb');
   define('DB_USER','root');
   define('DB_PASS','123456');
   define('DB_OPTION',null);
  
 
   