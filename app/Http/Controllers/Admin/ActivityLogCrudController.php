<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Spatie\Activitylog\Models\Activity;

class ActivityLogCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;

    public function setup(): void
    {
        CRUD::setModel(Activity::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/activity-log');
        CRUD::setEntityNameStrings('activity', 'activity logs');

        $this->crud->denyAccess(['create', 'update', 'delete']);
    }

    protected function setupListOperation(): void
    {
        CRUD::column('log_name')->label('Log');
        CRUD::column('description');
        CRUD::column('subject_type');
        CRUD::column('subject_id');
        CRUD::column('causer_id');
        CRUD::column('properties')->type('json');
        CRUD::column('created_at')->type('datetime');
    }
}
