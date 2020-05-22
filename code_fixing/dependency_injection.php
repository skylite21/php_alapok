<?php

/*
 * Use dependency injection to update HappyMessageSender and remove the need for
 * the dreaded global keyword.
 */

$emailLoader = new EmailAddressLoader();
$GLOBALS['emailLoader'] = $emailLoader;

$happyMessageSender = new HappyMessageSender();
$happyMessageSender->sendHappiness();

class EmailAddressLoader {

  public function getAllEmails() {
    // a class to fake loading emails (e.g. from a database)
    return [
      'bob@symfony.com',
      'jeff@gmail.com',
      'sunshine_girl@gmail.com',
    ];
  }

}


class HappyMessageSender {

  public function sendHappiness() {
    global $emailLoader;
    $emails = $emailLoader->getAllEmails();
    foreach ($emails as $email) {
      // just print for testing
      echo 'I hope you\'re having a GREAT day ' . $email . "\n";
    }
  }

}

/*


Solution:




 */

/*
 * class EmailAddressLoader {
 *
 *   public function getAllEmails() {
 *     // a class to fake loading emails (e.g. from a database)
 *     return [
 *     'bob@symfony.com',
 *     'jeff@gmail.com',
 *     'sunshine_girl@gmail.com',
 *     ];
 *   }
 *
 * }
 *
 *
 * class HappyMessageSender {
 *
 *   public function __construct($emailLoader) {
 *     $this->emailLoader = $emailLoader;
 *   }
 *
 *   public function sendHappiness() {
 *     $emails = $this->emailLoader->getAllEmails();
 *     foreach ($emails as $email) {
 *       // just print for testing
 *       echo 'I hope you\'re having a GREAT day ' . $email . "\n";
 *     }
 *   }
 *
 * }
 *
 * $emailLoader = new EmailAddressLoader();
 * $happyMessageSender = new HappyMessageSender($emailLoader);
 * $happyMessageSender->sendHappiness();
 */
