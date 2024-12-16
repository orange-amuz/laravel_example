<?php

namespace Database\Seeders;

use App\Models\Team\Department;
use App\Models\Team\Division;
use App\Models\Team\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $seederData = [
            [
                'title' => '서비스 개발본부',
                'departments' => [
                    [
                        'title' => '개발실',
                        'teams' => [
                            [
                                'title' => '글로벌 서비스 개발팀',
                                'leader' => ['name' => '전영곤', 'email' => 'zerogon'],
                                'users' => [
                                ],
                            ],
                            [
                                'title' => '모바일서비스 개발팀',
                                'leader' => ['name' => '조영진', 'email' => 'jerry'],
                                'users' => [
                                    ['name' => '장상훈', 'email' => 'hoowave'],
                                ],
                            ],
                        ],
                        'leader' => ['name' => '변삼영', 'email' => 'ddk'],
                    ],
                    [
                        'title' => '디자인실',
                        'teams' => [
                            [
                                'title' => 'UI/UX 1팀',
                                'leader' => ['name' => '정연경', 'email' => 'yangang'],
                                'users' => [
                                ],
                            ],
                            [
                                'title' => 'UI/UX 2팀',
                                'leader' => ['name' => '신응수', 'email' => 'cwal'],
                                'users' => [
                                ],
                            ],
                        ],
                        'leader' => ['name' => '이주희', 'email' => '2weeks'],
                    ],
                    [
                        'title' => '기술개발연구소',
                        'teams' => [
                            [
                                'title' => '선행제어 TASK',
                                'leader' => ['name' => '장주환', 'email' => 'orange'],
                                'users' => [
                                    ['name' => '남지수', 'email' => 'jisoo'],
                                    ['name' => '임채준', 'email' => 'chaegpt'],
                                ],
                            ],
                            [
                                'title' => '시스템통합 TASK',
                                'leader' => ['name' => '김제완', 'email' => 'complete'],
                                'users' => [
                                ],
                            ],
                        ],
                        'leader' => ['name' => '권오영', 'email' => 'zooz'],
                    ],
                ],
                'leader' => ['name' => '김성민', 'email' => 'smnism'],
            ],
            [
                'title' => '대표이사실',
                'leader' => ['name' => '이우진', 'email' => 'ceo'],
            ],
        ];

        foreach($seederData as $divisionData) {
            $title = $divisionData['title'];
            $leader = $divisionData['leader'];

            $division = Division::query()->create([
                'title' => $title,
            ]);

            if(isset($leader)) {
                $this->createLeader($leader, $division);
            }

            if(!isset($divisionData['departments'])) {
                continue;
            }

            $departments = $divisionData['departments'];

            foreach($departments as $departmentData) {
                $title = $departmentData['title'];
                $leader = $departmentData['leader'];


                $department = Department::query()->create([
                    'title' => $title,
                    'division_id' => $division->getKey(),
                ]);

                if(isset($leader)) {
                    $this->createLeader($leader, $department);
                }

                if(!isset($departmentData['teams'])) {
                    continue;
                }

                $teams = $departmentData['teams'];

                foreach($teams as $teamData) {
                    $title = $teamData['title'];
                    $users = $teamData['users'];
                    $leader = $teamData['leader'];

                    $team = Team::query()->create([
                        'title' => $title,
                        'department_id' => $department->getKey(),
                    ]);

                    if(isset($leader)) {
                        $this->createLeader($leader, $team);
                    }

                    if(isset($users)) {
                        foreach($users as $userData) {
                            $this->createUser($userData, $team);
                        }
                    }
                }
            }
        }
    }

    private function createUser(array $userInfo, Division|Department|Team $teamable) : User|null {
        if($userInfo['name'] == null || $userInfo['email'] == null) {
            return null;
        }

        $user = User::query()->updateOrCreate([
            'name' => $userInfo['name'],
            'email' => $userInfo['email'] . '@amuz.co.kr',
            'password' => Hash::make('amuz1234'),
            'teamable_type' => $teamable::class,
            'teamable_id' => $teamable->getKey(),
        ]);

        return $user;
    }

    private function createLeader(array $leaderInfo, Division|Department|Team $teamable) : User|null {
        if($leaderInfo['name'] == null || $leaderInfo['email'] == null) {
            return null;
        }

        $user = User::query()->updateOrCreate([
            'name' => $leaderInfo['name'],
            'email' => $leaderInfo['email'] . '@amuz.co.kr',
            'password' => Hash::make('amuz1234'),
            'teamable_type' => $teamable::class,
            'teamable_id' => $teamable->getKey(),
            'role' => 'leader',
        ]);

        return $user;
    }
}
