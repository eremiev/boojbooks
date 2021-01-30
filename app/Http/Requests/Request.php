<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{

    /**
     * Default rules when listing items.
     *
     * @var array
     */
    protected $listRules = [
        'per_page' => 'integer'
    ];

    /**
     * Get the function name that user is trying to access from the request:
     * index, store, update, etc.
     *
     * @return string
     */
    protected function getActionName()
    {
        $actionName = $this->route()->getActionName();
        $explode = explode('@', $actionName);
        $functionName = end($explode);

        return $functionName;
    }

    /**
     * Check if the user is trying to access index method.
     *
     * @return bool
     */
    protected function wantsToList()
    {
        if ($this->getActionName() == 'index') {
            return true;
        }

        return false;
    }

    /**
     * Check if the User is trying to access store method.
     *
     * @return bool
     */
    protected function wantsToStore()
    {
        if ($this->getActionName() == 'store') {
            return true;
        }

        return false;
    }

    /**
     * Check if the User is trying to access show method.
     *
     * @return bool
     */
    protected function wantsToShow()
    {
        if ($this->getActionName() == 'show') {
            return true;
        }

        return false;
    }

    /**
     * Check if the User is trying to access update method.
     *
     * @return bool
     */
    protected function wantsToUpdate()
    {
        if ($this->getActionName() == 'update') {
            return true;
        }

        return false;
    }

    /**
     * Check if the User is trying to access destroy method.
     *
     * @return bool
     */
    protected function wantsToDestroy()
    {
        if ($this->getActionName() == 'destroy') {
            return true;
        }

        return false;
    }
}
