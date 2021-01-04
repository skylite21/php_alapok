<?php

/*
 * iterate: to cycle trough something... we can do that with a foreach for
 * example the problem is that we can only iterate trough arrays...
 * iterating over an object by default only iterates over its public
 * properties...
 */


/*
 * if we implement IteratorAggregate we can create our own iterable
 * IteratorAggregate is an easy way to implement an Iterator.
 * We could also use the Iterator interface, but that is a bit more complex...
 * https://www.php.net/manual/en/class.iterator.php
 */
class Collection implements IteratorAggregate {
  protected $items;

  public function __construct(array $items) {
    $this->items = $items;
  }

  // the iterator interface has to have a getIterator method
  public function getIterator() {
    /*
     * php standard library provides the ArrayIterator
     * there are a ton of different ones if you are interested...
     * https://www.php.net/manual/en/spl.iterators.php
     */
    return new ArrayIterator($this->items);
  }

}

class User {
  public $email;

}

$user1 = new User();
$user1->email = 'email@fg.hu';
$user2 = new User();
$user2->email = 'my@me.com';

$users = new Collection([$user1, $user2]);
// looping trough an object is possible now
foreach ($users as $user) {
  echo $user->email . ' ';
}

echo "\n";

class Mail {
  protected $recipients;
  protected $emails = [];

  // az iterable array vagy bármi más iterable is lehet
  public function setRecipients(iterable $recipients) : void {
    $this->recipients = $recipients;
    foreach ($recipients as $recipient) {
      if ($recipient instanceof User) {
        $this->emails[] = $recipient->email;
      }
      else {
        $this->emails[] = $recipient;
      }
    }
  }

  public function getRecipients() : iterable {
    return $this->recipients;
  }

  public function getEmails() : iterable {
    return $this->emails;
  }

}

$mail = new Mail();
// collection-t is kaphat a setRecipients
$mail->setRecipients($users);
var_dump($mail->getEmails());
