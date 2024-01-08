<?php

namespace AnuzPandey\LaravelLivewireTablesHelper\Traits;

use Rappasoft\LaravelLivewireTables\Views\Column;

trait HasSerialNumberColumn
{
    protected int $index = 0;
    protected string $serialNumberColumnLabel = 'SN';

    public function prependColumns(): array
    {
        return [
            Column::make('SN')
                ->label(fn ($row, Column $column) => ++$this->index),
        ];
    }

    public function setSerialNumberColumnLabel(string $label): self
    {
        $this->serialNumberColumnLabel = $label;

        return $this;
    }
}
