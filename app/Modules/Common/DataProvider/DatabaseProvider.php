<?php

namespace App\Modules\Common\DataProvider;

use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class DatabaseProvider
{
    public $model;

    protected $modelInstance;

    /**
     * Create record
     *
     * @param $attributes
     * @return Model
     */
    public function create($attributes)
    {
        return $this->newQuery()->create($attributes);
    }

    /**
     * @param null $query
     * @return mixed|null
     */
    public function newQuery($query = null)
    {
        if (empty($this->model)) {
            throw new InvalidArgumentException('Model Class was missing in Provider');
        }

        # Start from scratch if there is no initial query
        if (is_null($query)) {
            $query = (new $this->model)->newQuery();
        }

        return $query;
    }

    /**
     * Return model instance to access instance's method
     * @return Model
     */
    public function getInstance()
    {
        if (is_null($this->modelInstance)) {
            $this->modelInstance = new $this->model;
        }

        return $this->modelInstance;
    }
}