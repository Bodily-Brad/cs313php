<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Session support
session_start();

// Password functions
require_once('password.php');

// Connect to database
require_once('dbConnection.php');
$db = loadDB();

// Get Action
$action = getVariable("action");

switch (strtolower($action))
{
    // Create a new user account
    case "createuser":
        // Get username/password from form
        $newName = getVariable("name");
        $newPass = getVariable("pass");

        // Attempt to add new user
        $passwordHash = password_hash($newPass, PASSWORD_BCRYPT);
        $success = insertUser($newName, $passwordHash);
        
        // IF SUCCESSFUL, show welcome page
        if ($success)
        {
            // Login User
            loginUser($newName);
            
            $username = $newName;
            
            // Show welcome page
            include('views/welcomePage.php');
        }
        else
        {
            // See if desired username was already taken
            $query = "SELECT * FROM user WHERE user_name = '" . $newName . "'";
            $stmt = $db->prepare($query);
            $stmt->execute();
            //There can only be one.
            if($stmt->rowCount() == 0)
            {
                // Not an existing user, must have been some other error
                $message = "There was a problem creating the account. Please try again.";
            }
            else
            {
                $message = "That username already exists, please choose a new one.";
            }
            
            // (re)show sign up form
            include('views/createUserForm.php');
        }
        break;
    
    // Login using the specified credentials
    case "login":
        // Get username/password from form
        $username = getVariable("username");
        $password = getVariable("password");
                
        // Check if credentials are valid
        if (getCredentialsAreValid($username, $password))
        {
            // "Log the user in" / store session variable
            loginUser($username);
            // Show welcome page
            include('views/welcomePage.php');
        }
        // Otherwise, show login form
        else
        {
            $message = "Invalid username or password";
            include('views/loginForm.php');            
        }
        break;
    
    // Logout    
    case "logout":
        logoutUser();
        include('views/loginForm.php');
        break;
    
    // Show the Sign-up form
    case "signup":
        include('views/createUserForm.php');
        break;
    
    // No action specified / show welcome page if logged in; otherwise, show
    // sign-in page
    default:
        // Check if user is already logged in
        if (getUserIsLoggedIn())
        {
            // Get current user's username
            $username = getCurrentUser();
            // Show welcome page
            include('views/welcomePage.php');
        }
        // Otherwise, show login form
        else
        {
            include('views/loginForm.php');
        }
        break;
}
    

// Checks whether the specified username and password are valid
function getCredentialsAreValid($username, $password)
{
    global $db;

    // Query String
    $query = "
        SELECT *
        FROM     user
        WHERE    user_name = :username";

    try
    {
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);            
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        // If user doesn't exist, return false
        if (empty($result))
            return false;

        // Validate using password_verify()
        return (password_verify($password, $result['password']));
    } catch (PDOException $ex) {
        echo $ex->getMessage();
        exit;
    }        
}


// Gets the currently logged in username
function getCurrentUser()
{
    if (isset($_SESSION["currentUser"]))
        return $_SESSION["currentUser"];
    // Else
    return false;
}
    
// Logs in the specified user
function loginUser($username)
{
    $_SESSION["currentUser"] = $username;
}

// Logs out the current user
function logoutUser()
{
    unset($_SESSION["currentUser"]);
}
   
// Gets whether a user is currently signed in or not
function getUserIsLoggedIn()
{
    // Check session variable
    if (isset($_SESSION["currentUser"])) return true;
    
    // else
    return false;
}

// Gets a passed variable from a form or the URL
function getVariable($variableName)
{
    if (isset($_GET[$variableName])) {
        $return = $_GET[$variableName];
    } elseif (isset($_POST[$variableName])) {
        $return = $_POST[$variableName];
    } else {
        return NULL;
    }  

    return $return;
}

// Attempts to add a new user to the database
function insertUser($username, $hash)
{
    global $db;    

   $query = $db->prepare('INSERT INTO users_db.user (user_name, password) VALUES ("'. 
           $username . '" , "' . $hash .'")');

    return $query->execute();
}
?>
