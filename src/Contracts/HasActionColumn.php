<?php

namespace AnuzPandey\LaravelLivewireTablesHelper\Contracts;

interface HasActionColumn
{
    public function appendColumns(): array;

    public function setActionColumnAttributes(array $attributes = []): self;
}
