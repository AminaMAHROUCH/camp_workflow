<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'responsable_access',
            ],
            [
                'id'    => '18',
                'title' => 'responsible_create',
            ],
            [
                'id'    => '19',
                'title' => 'responsible_edit',
            ],
            [
                'id'    => '20',
                'title' => 'responsible_show',
            ],
            [
                'id'    => '21',
                'title' => 'responsible_delete',
            ],
            [
                'id'    => '22',
                'title' => 'responsible_access',
            ],
            [
                'id'    => '23',
                'title' => 'news_create',
            ],
            [
                'id'    => '24',
                'title' => 'news_edit',
            ],
            [
                'id'    => '25',
                'title' => 'news_show',
            ],
            [
                'id'    => '26',
                'title' => 'news_delete',
            ],
            [
                'id'    => '27',
                'title' => 'news_access',
            ],
            [
                'id'    => '28',
                'title' => 'group_responsible_create',
            ],
            [
                'id'    => '29',
                'title' => 'group_responsible_edit',
            ],
            [
                'id'    => '30',
                'title' => 'group_responsible_show',
            ],
            [
                'id'    => '31',
                'title' => 'group_responsible_delete',
            ],
            [
                'id'    => '32',
                'title' => 'group_responsible_access',
            ],
            [
                'id'    => '33',
                'title' => 'group_create',
            ],
            [
                'id'    => '34',
                'title' => 'group_edit',
            ],
            [
                'id'    => '35',
                'title' => 'group_show',
            ],
            [
                'id'    => '36',
                'title' => 'group_delete',
            ],
            [
                'id'    => '37',
                'title' => 'group_access',
            ],
            [
                'id'    => '38',
                'title' => 'participant_create',
            ],
            [
                'id'    => '39',
                'title' => 'participant_edit',
            ],
            [
                'id'    => '40',
                'title' => 'participant_show',
            ],
            [
                'id'    => '41',
                'title' => 'participant_delete',
            ],
            [
                'id'    => '42',
                'title' => 'participant_access',
            ],
            [
                'id'    => '43',
                'title' => 'workshop_create',
            ],
            [
                'id'    => '44',
                'title' => 'workshop_edit',
            ],
            [
                'id'    => '45',
                'title' => 'workshop_show',
            ],
            [
                'id'    => '46',
                'title' => 'workshop_delete',
            ],
            [
                'id'    => '47',
                'title' => 'workshop_access',
            ],
            [
                'id'    => '48',
                'title' => 'workshop_responsible_create',
            ],
            [
                'id'    => '49',
                'title' => 'workshop_responsible_edit',
            ],
            [
                'id'    => '50',
                'title' => 'workshop_responsible_show',
            ],
            [
                'id'    => '51',
                'title' => 'workshop_responsible_delete',
            ],
            [
                'id'    => '52',
                'title' => 'workshop_responsible_access',
            ],
            [
                'id'    => '53',
                'title' => 'group_news_create',
            ],
            [
                'id'    => '54',
                'title' => 'group_news_edit',
            ],
            [
                'id'    => '55',
                'title' => 'group_news_show',
            ],
            [
                'id'    => '56',
                'title' => 'group_news_delete',
            ],
            [
                'id'    => '57',
                'title' => 'group_news_access',
            ],
            [
                'id'    => '58',
                'title' => 'workshop_news_create',
            ],
            [
                'id'    => '59',
                'title' => 'workshop_news_edit',
            ],
            [
                'id'    => '60',
                'title' => 'workshop_news_show',
            ],
            [
                'id'    => '61',
                'title' => 'workshop_news_delete',
            ],
            [
                'id'    => '62',
                'title' => 'workshop_news_access',
            ],
            [
                'id'    => '63',
                'title' => 'responsible_news_create',
            ],
            [
                'id'    => '64',
                'title' => 'responsible_news_edit',
            ],
            [
                'id'    => '65',
                'title' => 'responsible_news_show',
            ],
            [
                'id'    => '66',
                'title' => 'responsible_news_delete',
            ],
            [
                'id'    => '67',
                'title' => 'responsible_news_access',
            ],
            [
                'id'    => '68',
                'title' => 'agenda_create',
            ],
            [
                'id'    => '69',
                'title' => 'agenda_edit',
            ],
            [
                'id'    => '70',
                'title' => 'agenda_show',
            ],
            [
                'id'    => '71',
                'title' => 'agenda_delete',
            ],
            [
                'id'    => '72',
                'title' => 'agenda_access',
            ],
            [
                'id'    => '73',
                'title' => 'meeting_create',
            ],
            [
                'id'    => '74',
                'title' => 'meeting_edit',
            ],
            [
                'id'    => '75',
                'title' => 'meeting_show',
            ],
            [
                'id'    => '76',
                'title' => 'meeting_delete',
            ],
            [
                'id'    => '77',
                'title' => 'meeting_access',
            ],
            [
                'id'    => '78',
                'title' => 'profile_password_edit',
            ],
           [
                'id'    => '79',
                'title' => 'link_create',
            ],
            [
                'id'    => '80',
                'title' => 'link_edit',
            ],
            [
                'id'    => '81',
                'title' => 'link_show',
            ],
            [
                'id'    => '82',
                'title' => 'link_delete',
            ],
            [
                'id'    => '83',
                'title' => 'link_access',
            ],
           
        
        ];

        Permission::insert($permissions);
    }
}