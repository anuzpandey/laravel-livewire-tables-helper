<?php

namespace AnuzPandey\LaravelLivewireTablesHelper\Traits;

use Illuminate\Support\Arr;
use Rappasoft\LaravelLivewireTables\Views\Column;

trait ImplementsActionColumn
{
    public ?array $actionColumnAttributes = [];

    public function appendColumns(): array
    {
        return [
            Column::make('Action')
                ->label(function ($row, Column $column) {
                    $updatePermission = $this->actionColumnAttributes['updatePermission'] ?? null;
                    $editRoute = Arr::has($this->actionColumnAttributes, 'editRoute') && $this->actionColumnAttributes['editRoute']
                        ? route($this->actionColumnAttributes['editRoute'], $row)
                        : null;
                    $deletePermission = $this->actionColumnAttributes['deletePermission'] ?? null;
                    $deleteRoute = Arr::has($this->actionColumnAttributes, 'deleteRoute') && $this->actionColumnAttributes['deleteRoute']
                        ? route($this->actionColumnAttributes['deleteRoute'], $row)
                        : null;
                    $viewPermission = $this->actionColumnAttributes['viewPermission'] ?? null;
                    $showRoute = Arr::has($this->actionColumnAttributes, 'showRoute') && $this->actionColumnAttributes['showRoute']
                        ? route($this->actionColumnAttributes['showRoute'], $row)
                        : null;
                    $showTarget = $this->actionColumnAttributes['showTarget'] ?? '_blank';

                    $viewData = [
                        'updatePermission' => $updatePermission,
                        'editRoute' => $editRoute,
                        'deletePermission' => $deletePermission,
                        'deleteRoute' => $deleteRoute,
                        'viewPermission' => $viewPermission,
                        'showRoute' => $showRoute,
                        'showTarget' => $showTarget,
                        'row' => $row,
                        'column' => $column,
                    ];

                    return view('livewire-tables-helper.action-column', $viewData);
                })
                ->html(),
        ];
    }

    public function setActionColumnAttributes(array $attributes = []): self
    {
        $this->actionColumnAttributes = [...$attributes];

        return $this;
    }
}
