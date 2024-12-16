<?php

namespace App\Services;

use Illuminate\Support\Facades\Facade;

class Messages extends Facade {
  protected static function getFacadeAccessor() : string
  {
    return 'messages';
  }
}