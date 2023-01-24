<?php

declare(strict_types=1);

namespace App\Repositories;

/**
 * Abstract Repository
 *
 * @package App\Repositories
 * @author  Thiago Silva <thiagom.devsec@gmail.com>
 * @version 1.0
 */
abstract class Repository
{
    /**
     * Abstract model
     *
     * @var object
     */
    protected $model;

    private function handler(): mixed
    {
        return app($this->model);
    }

    /**
     * Model injection
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = $this->handler();
    }
}
