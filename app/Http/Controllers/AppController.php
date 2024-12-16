<?php

namespace App\Http\Controllers;

use App\Models\Team\Department;
use App\Models\Team\Division;

class AppController extends Controller {
    public function index() {
      return view('rendering')  ;
    }

    public function org() {
      $divisions = Division::with([
        'departments',
        'user',
        'departments.user',
        'departments.teams',
        'departments.teams',
        'departments.teams.users',
      ])->get();

      return view('org', [
        'divisions' => $divisions,
      ]);
    }
}