<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\ContributorLink;

class MaxLinkRecords implements Rule
{

    private $userId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($userId)
    {
        $this->userId = $userId;


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
        $count = ContributorLink::where('user_id', $this->userId)->count();


        return $count < 12 ? true : false;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You cannot have more than 12 Links';
    }
}
