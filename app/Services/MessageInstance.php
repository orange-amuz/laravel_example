<?php

namespace App\Services;

class MessageInstance {
  public $messageBox = array();

  public function addMessage(string $message) : void {
    $this->messageBox[] =  $message;
  }

  public function printMessage() : array {
    // return join("</br>", $this->messageBox);
    // return join('->', $this->messageBox);
    return $this->messageBox;
  }
}