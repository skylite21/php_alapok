<?php

# some helpers for the excersize below...
# scroll down to see your task...

class Logger {

  public function logMessage($message) {
    echo $message . "\n";
  }

}

class Database {

  public function session_exists() {
    return FALSE;
  }

  public function add_user() {
    return TRUE;
  }

}

class User {
  public $error;

}

class ApiHandler {

  public function get_user_by_token() {
    return new User();
  }

}

class Session {
  public static $access_token = FALSE;

}

class Request {
  public static $token = '23ref';

}

$logger = new Logger();
$db = new Database();
$remote_api = new ApiHandler();

/*
 * TODO reduce the indentation as much as you can
 * while achieving the same functionality.
 * else statements usually over complicate the code, and 
 * mess up readability. There is also a golden rule in php:
 * "don't use else statements"
 */

// checks if user is logged in
function is_user_logged_in($logger, $db, $remote_api) {
  $logger->logMessage('Login check started...');
  // first check if user has session
  if (Session::$access_token === TRUE) {
    $logger->logMessage('token exists in session: ' . Session::$access_token);
    return TRUE;
  }
  else {
    // then check if the user has a ?token= parameter and if that exists in
    // the database...
    if (isset(Request::$token) === TRUE) {
      if ($db->session_exists(Request::$token) === TRUE) {
        $logger->logMessage('token exists in database');
        return TRUE;
      }
      else {
        // If nothing, try to validate the token on the remote api and create a
        // session + db entry if the token is valid
        $user = $remote_api->get_user_by_token(Request::$token);
        if ($user === NULL) {
          $logger->logMessage('token is rejected by the remote api');
          return FALSE;
        }
        if ($user->error !== NULL) {
          $logger->logMessage('user exists, but there is an error: ' . $user->error);
          return FALSE;
        }
        else {
          //  ended down here, so:
          // add the user to the database
          $db->add_user($user, Request::$token);
          Session::$access_token = Request::$token;
          $logger->logMessage('user is authentikated by token, added to the db;');
          return TRUE;
        }
      }
    }
  }
}

is_user_logged_in($logger, $db, $remote_api);

/*





Solution









 */
/*
 * // checks if user is logged in. first check if user has session
 * function is_user_logged_in($logger, $db, $remote_api) {
 *   $logger->logMessage('Login check started...');
 *   if (Session::$access_token === TRUE) {
 *     $logger->logMessage('token exists in session: ' . Session::$access_token);
 *     return TRUE;
 *   }
 *   // then check if the user has a ?token= parameter and if that exists in
 *   // the database...
 *   if (isset(Request::$token) === TRUE
 *     && $db->session_exists(Request::$token) === TRUE) {
 *     $logger->logMessage('token exists in database');
 *     return TRUE;
 *   }
 *   // If nothing, try to validate the token on the remote api and create a
 *   // session + db entry if the token is valid
 *   $user = $remote_api->get_user_by_token(Request::$token);
 *   if ($user === NULL) {
 *     $logger->logMessage('token is rejected by the remote api');
 *     return FALSE;
 *   }
 *   if ($user->error !== NULL) {
 *     $logger->logMessage('user exists, but there is an error: ' . $user->error);
 *     return FALSE;
 *   }
 *
 *   //  ended down here, so:
 *   // add the user to the database
 *   $db->add_user($user, Request::$token);
 *   Session::$access_token = Request::$token;
 *   $logger->logMessage('user is authentikated by token, added to the db;');
 *   return TRUE;
 * }
 */
