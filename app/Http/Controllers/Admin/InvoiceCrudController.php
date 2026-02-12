<?php

namespace App\Http\Controllers\Admin;

use App\Models\Invoice;
use App\Models\Service;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(Invoice::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/invoice');
        CRUD::setEntityNameStrings('invoice', 'invoices');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('invoice_number');
        CRUD::column('client_name');
        CRUD::column('issue_date')->type('date');
        CRUD::column('due_date')->type('date');
        CRUD::column('currency');
        CRUD::column('subtotal')->type('number');
        CRUD::column('tax_amount')->type('number');
        CRUD::column('total_amount')->type('number');

        CRUD::addButtonFromView('line', 'download_pdf', 'download_invoice_pdf', 'end');
    }

    protected function setupCreateOperation(): void
    {
        CRUD::field('client_name')->label('Client Name');
        CRUD::field('invoice_number')->label('Invoice #')->hint('Auto-generated if left empty');
        CRUD::field('issue_date')->type('date');
        CRUD::field('due_date')->type('date');
        CRUD::field('currency')->type('text')->default('KES');

        CRUD::field('items')->type('repeatable')->label('Items')->fields([
            [
                'name' => 'service_id',
                'label' => 'Service',
                'type' => 'select2',
                'entity' => 'service',
                'model' => Service::class,
                'attribute' => 'name',
            ],
            [
                'name' => 'description',
                'label' => 'Description',
                'type' => 'text',
            ],
            [
                'name' => 'unit_price',
                'label' => 'Unit Price',
                'type' => 'number',
                'attributes' => ['step' => '0.01', 'min' => '0'],
            ],
            [
                'name' => 'quantity',
                'label' => 'Qty',
                'type' => 'number',
                'attributes' => ['step' => '1', 'min' => '1'],
                'default' => 1,
            ],
        ])->new_item_label('Add Item')->init_rows(1);

        CRUD::field('tax_rate')->type('number')->label('Tax %')->default(16)->attributes(['step' => '0.01', 'min' => '0']);
        CRUD::field('account_details')->type('textarea')->label('Account Details')->hint("Bank, account name/number or payment instructions");
        CRUD::field('terms')->type('textarea')->label('Terms & Conditions');
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }

    public function pdf($id)
    {
        $invoice = Invoice::findOrFail($id);
        $pdf = Pdf::loadView('admin.invoices.pdf', compact('invoice'));
        $filename = $invoice->invoice_number . '.pdf';
        return $pdf->download($filename);
    }
}
