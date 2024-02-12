<?php

namespace App\DTO;

class LanguageSwitcherDTO{

    public object $siteEntity;
    public mixed $repository;
    public string $type;

    public function __construct(object $siteEntity, mixed $repository, string $type) {
        $this->siteEntity = $siteEntity;
        $this->repository = $repository;
        $this->email = $type;
    }
}
