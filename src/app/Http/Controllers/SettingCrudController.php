<?php

namespace Backpack\Settings\app\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class SettingCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;

    public function setup()
    {
        CRUD::setModel("Backpack\Settings\app\Models\Setting");
        CRUD::setEntityNameStrings(trans('backpack::settings.setting_singular'), trans('backpack::settings.setting_plural'));
        CRUD::setRoute(backpack_url('setting'));

        CRUD::operation('list', function () {
            // only show settings which are marked as active
            CRUD::addClause('where', 'active', 1);

            // columns to show in the table view
            CRUD::setColumns([
                [
                    'name'  => 'name',
                    'label' => trans('backpack::settings.name'),
                ],
                [
                    'name'  => 'value',
                    'label' => trans('backpack::settings.value'),
                ],
                [
                    'name'  => 'description',
                    'label' => trans('backpack::settings.description'),
                ],
            ]);
        });

        CRUD::operation('update', function () {
            CRUD::addField([
                'name'       => 'name',
                'label'      => trans('backpack::settings.name'),
                'type'       => 'text',
                'attributes' => [
                    'disabled' => 'disabled',
                ],
            ]);
        });
    }

    public function edit($id)
    {
        $this->crud->hasAccessOrFail('update');

        $this->data['entry'] = $this->crud->getEntry($id);
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->crud->getSaveAction();
        $this->data['title'] = trans('backpack::crud.edit').' '.$this->crud->entity_name;
        $this->data['id'] = $id;

        $this->crud->addField(json_decode($this->data['entry']->field, true));
        $this->crud->setOperationSetting('fields', $this->crud->getUpdateFields());

        return view($this->crud->getEditView(), $this->data);
    }
}
