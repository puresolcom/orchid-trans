<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Prettus\Repository\Contracts\RepositoryInterface;

class UniqueRepo implements Rule
{
    protected $repo;
    protected $column;
    protected $except;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(RepositoryInterface $repo, $column, $except = null)
    {
        $this->repo = $repo;
        $this->column = $column;
        $this->except = $except;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $exists = $this->repo->findWhere([
            $this->column => $value,
        ]);

        if (!$exists->isEmpty()) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('Email address already in use');
    }
}
