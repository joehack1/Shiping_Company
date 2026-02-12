<?php

namespace App\Http\Controllers\Admin;

use App\Models\QuickRequest;
use App\Models\Service;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class QuickRequestCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(QuickRequest::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/quick-request');
        CRUD::setEntityNameStrings('quick request', 'quick requests');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('phone');
        CRUD::column('email');
        CRUD::column('status');
        CRUD::column('created_at')->type('datetime');
    }

    protected function setupShowOperation(): void
    {
        CRUD::column('phone');
        CRUD::column('email');
        CRUD::column('status');
        CRUD::column('created_at')->type('datetime');
        CRUD::addColumn([
            'name' => 'service_ids',
            'label' => 'Services',
            'type' => 'view',
            'view' => 'admin.quick_requests.services_column',
        ]);
    }
}
