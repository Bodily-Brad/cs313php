<?php

function loadDB()
{

    // Check for OpenShift environment var and connect accordingly
    $openShiftCheck = getenv('OPENSHIFT_MYSQL_DB_HOST');

    if ($openShiftCheck === null || $openShiftCheck == "")
    {
        // Use Local
        // TO DO: Add your own local credintials
    }
    else
    {
        // Use OpenShift

        // Values for across domains
        $crossDomain = false;
        if ($crossDomain)
        {
            $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
            $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
            $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
            $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');        
        }
        else
        {    
            // Values for Chris's domain
            $dbHost = "http://php-cvergara.rhcloud.com";
            $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
            $dbUser = getenv('php');
            $dbPassword = getenv('php-pass-150864067');  
        }   
    }

    // Temp stuff
    echo "host:$dbHost:$dbPort dbName:$dbName user:$dbUser password:$dbPassword<br >\n";
}