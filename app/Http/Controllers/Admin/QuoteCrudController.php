<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QuoteRequest;
use App\Models\Quote;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class QuoteCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(Quote::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/quote');
        CRUD::setEntityNameStrings('quote', 'quotes');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('service_type');
        CRUD::column('origin_country');
        CRUD::column('destination_country');
        CRUD::column('name')->label('Contact');
        CRUD::column('email');
        CRUD::column('weight_kg')->type('number');
        CRUD::column('ready_date')->type('date');
        CRUD::column('created_at')->type('datetime');
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(QuoteRequest::class);

        CRUD::field('service_type')->type('select_from_array')->options([
            'Overseas Shipping' => 'Overseas Shipping',
            'Import Management' => 'Import Management',
            'Warehousing & Storage' => 'Warehousing & Storage',
            'Project Cargo' => 'Project Cargo',
        ])->allows_null(false);

        CRUD::field('origin_country');
        CRUD::field('destination_country');
        CRUD::field('cargo_description')->type('textarea');
        CRUD::field('weight_kg')->type('number')->attributes(['step' => '0.01']);
        CRUD::field('volume_cbm')->type('number')->attributes(['step' => '0.01']);
        CRUD::field('ready_date')->type('date');
        CRUD::field('name')->label('Contact Name');
        CRUD::field('email');
        CRUD::field('phone');
        CRUD::field('company');
        CRUD::field('notes')->type('textarea');
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
