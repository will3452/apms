<?php

use App\Models\Permission;
use Illuminate\Database\Migrations\Migration;

class SeedSubjectPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permissions = [
            'view any subject',
            'view subject',
            'create subject',
            'update subject',
            'delete subject',
        ];

        collect($permissions)->each(function ($permission) {
            Permission::create(['group' => 'subjects', 'name' => $permission]);
        });

        $permissions = [
            'view any exam',
            'view exam',
            'create exam',
            'update exam',
            'delete exam',
        ];

        collect($permissions)->each(function ($permission) {
            Permission::create(['group' => 'exams', 'name' => $permission]);
        });

        $permissions = [
            'view any grade',
            'view grade',
            'create grade',
            'update grade',
            'delete grade',
        ];

        collect($permissions)->each(function ($permission) {
            Permission::create(['group' => 'grades', 'name' => $permission]);
        });

        $permissions = [
            'view any attendance',
            'view attendance',
            'create attendance',
            'update attendance',
            'delete attendance',
        ];

        collect($permissions)->each(function ($permission) {
            Permission::create(['group' => 'attendances', 'name' => $permission]);
        });

        $permissions = [
            'view any guardian',
            'view guardian',
            'create guardian',
            'update guardian',
            'delete guardian',
        ];

        collect($permissions)->each(function ($permission) {
            Permission::create(['group' => 'guardians', 'name' => $permission]);
        });

        $permissions = [
            'view any teacher',
            'view teacher',
            'create teacher',
            'update teacher',
            'delete teacher',
        ];

        collect($permissions)->each(function ($permission) {
            Permission::create(['group' => 'teachers', 'name' => $permission]);
        });

        $permissions = [
            'view any student',
            'view student',
            'create student',
            'update student',
            'delete student',
        ];

        collect($permissions)->each(function ($permission) {
            Permission::create(['group' => 'students', 'name' => $permission]);
        });

        $permissions = [
            'view any class room',
            'view class room',
            'create class room',
            'update class room',
            'delete class room',
        ];

        collect($permissions)->each(function ($permission) {
            Permission::create(['group' => 'class rooms', 'name' => $permission]);
        });

        $permissions = [
            'view any schedule',
            'view schedule',
            'create schedule',
            'update schedule',
            'delete schedule',
        ];

        collect($permissions)->each(function ($permission) {
            Permission::create(['group' => 'schedules', 'name' => $permission]);
        });

        $permissions = [
            'view any year',
            'view year',
            'create year',
            'update year',
            'delete year',
        ];

        collect($permissions)->each(function ($permission) {
            Permission::create(['group' => 'years', 'name' => $permission]);
        });

        $permissions = [
            'view any announcement',
            'view announcement',
            'create announcement',
            'update announcement',
            'delete announcement',
        ];

        collect($permissions)->each(function ($permission) {
            Permission::create(['group' => 'announcements', 'name' => $permission]);
        });

        $permissions = [
            'view any activity',
            'view activity',
            'create activity',
            'update activity',
            'delete activity',
        ];

        collect($permissions)->each(function ($permission) {
            Permission::create(['group' => 'activities', 'name' => $permission]);
        });

        $permissions = [
            'view any fee',
            'view fee',
            'create fee',
            'update fee',
            'delete fee',
        ];

        collect($permissions)->each(function ($permission) {
            Permission::create(['group' => 'fees', 'name' => $permission]);
        });

        $permissions = [
            'view any message',
            'view message',
            'create message',
            'update message',
            'delete message',
        ];

        collect($permissions)->each(function ($permission) {
            Permission::create(['group' => 'messages', 'name' => $permission]);
        });

        $permissions = [
            'view any recognition',
            'view recognition',
            'create recognition',
            'update recognition',
            'delete recognition',
        ];

        collect($permissions)->each(function ($permission) {
            Permission::create(['group' => 'recognitions', 'name' => $permission]);
        });

        $permissions = [
            'view any certificate',
            'view certificate',
            'create certificate',
            'update certificate',
            'delete certificate',
        ];

        collect($permissions)->each(function ($permission) {
            Permission::create(['group' => 'certificates', 'name' => $permission]);
        });

    }

}
