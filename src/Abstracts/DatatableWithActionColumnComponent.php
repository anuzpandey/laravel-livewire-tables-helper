<?php

namespace AnuzPandey\LaravelLivewireTablesHelper\Abstracts;

use AnuzPandey\LaravelLivewireTablesHelper\Contracts\HasActionColumn;
use AnuzPandey\LaravelLivewireTablesHelper\Traits\ImplementsActionColumn;
use Rappasoft\LaravelLivewireTables\DataTableComponent;

abstract class DatatableWithActionColumnComponent extends DatatableComponent implements HasActionColumn
{
    use ImplementsActionColumn;
}
