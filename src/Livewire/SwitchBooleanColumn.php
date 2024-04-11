<?php

namespace AnuzPandey\LaravelLivewireTablesHelper\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;
use Rappasoft\LaravelLivewireTables\Exceptions\DataTableConfigurationException;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Traits\Configuration\BooleanColumnConfiguration;
use Rappasoft\LaravelLivewireTables\Views\Traits\Core\HasCallback;
use Rappasoft\LaravelLivewireTables\Views\Traits\Helpers\BooleanColumnHelpers;

class SwitchBooleanColumn extends Column
{
    use BooleanColumnConfiguration, BooleanColumnHelpers, HasCallback;

    protected string $type = 'icons';

    protected bool $successValue = true;

    public function getContents(Model $row): null|string|HtmlString|DataTableConfigurationException|Application|Factory|View
    {
        if ($this->isLabel()) {
            throw new DataTableConfigurationException('You can not specify a boolean column as a label.');
        }

        $value = $this->getValue($row);

        $this->clickable = false;

        return view('livewire-tables-helper::livewire-tables-helper.switch-boolean-column', [
            'row' => $row,
            'columnName' => $this->getFrom(),
        ])
            ->withComponent($this->getComponent())
            ->withSuccessValue($this->getSuccessValue())
            ->withType($this->getType())
            ->withStatus($this->hasCallback() ? call_user_func($this->getCallback(), $value, $row) : (bool) $value === true);
    }
}
