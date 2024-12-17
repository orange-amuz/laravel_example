# Learn Day 1

## Life Cycle

### Singleton + Facade

- `MessageInstance` class
  - has `messageBox` (array)
  - has methods : `addMessage()`, `printMessage()`
  - `printMessage()` return `join("<br />",$this->messageBox)`
- register `Messages` Facade Class + singleton (`AppServiceProvider`)


### middlewares & routes

#### route

- register 3 routes : `/` , `/page`, `/blog`
- Run in middlewares -> `Messages::addMessage('middlewareName');`
  - `GlobalMiddleware`
  - `LocalMiddleware`
  - `BlogMiddleware`

### views

- `rendering.blade.php`
- link routes (Unordered List)
- `<p> {!! Messages::printMessage() !!} </p>`

## Database & Model

### migration

- divisions
- departments
- teams

### model

- Division
- Department
- Team

### set relation

- Division < Department < Team < User

### seed

- Division : 2개이상
  - Department : 2개이상
      - Team : 2개이상
        - User : 2명이상