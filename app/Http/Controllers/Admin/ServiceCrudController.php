<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ServiceCrudController extends CrudController
{
    public function setup(): void
    {
        CRUD::setModel(Service::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/service');
        CRUD::setEntityNameStrings('service', 'services');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('name');
        CRUD::column('summary');
        CRUD::column('sort_order')->type('number');
        CRUD::column('is_active')->type('boolean');
        CRUD::column('updated_at')->type('datetime');
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(ServiceRequest::class);

        CRUD::field('name');
        CRUD::field('summary')->type('text');
        CRUD::field('description')->type('textarea');
        CRUD::field('sort_order')->type('number')->default(0);
        CRUD::field('is_active')->type('checkbox')->default(true);
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
