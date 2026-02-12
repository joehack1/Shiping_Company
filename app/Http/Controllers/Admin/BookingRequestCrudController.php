<?php

namespace App\Http\Controllers\Admin;

use App\Models\BookingRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class BookingRequestCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(BookingRequest::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/booking-request');
        CRUD::setEntityNameStrings('booking request', 'booking requests');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('name');
        CRUD::column('email');
        CRUD::column('phone');
        CRUD::column('where_to')->label('Destination');
        CRUD::column('status');
        CRUD::column('created_at')->type('datetime');
    }

    protected function setupShowOperation(): void
    {
        CRUD::column('name');
        CRUD::column('email');
        CRUD::column('phone');
        CRUD::column('where_to')->label('Destination');
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
