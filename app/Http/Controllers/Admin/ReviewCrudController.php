<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ReviewCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(Review::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/review');
        CRUD::setEntityNameStrings('review', 'reviews');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('client_name')->label('Client');
        CRUD::column('rating')->type('number');
        CRUD::column('is_published')->type('boolean');
        CRUD::column('published_at')->type('datetime');
        CRUD::column('created_at')->type('datetime');
    }

    protected function setupCreateOperation(): void
    {
        CRUD::field('client_name')->label('Client Name');
        CRUD::field('rating')->type('number')->attributes(['min' => 1, 'max' => 5])->default(5);
        CRUD::field('comment')->type('textarea')->attributes(['rows' => 4]);
        CRUD::field('is_published')->type('checkbox')->default(true);
        CRUD::field('published_at')->type('datetime')->default(now());
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
