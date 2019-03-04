<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ImplicitRule;
use GuzzleHttp\Client;

class ValidCaptcha implements ImplicitRule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($gresponse)
    {
        //
        $this->gresponse = $gresponse;
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
        // Validate ReCaptcha
        $client = new Client([
            'base_uri' => 'https://google.com/recaptcha/api/'
        ]);
        $response = $client->post('siteverify', [
            'query' => [
                'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
                'response' => $this->gresponse
            ]
        ]);
        return json_decode($response->getBody())->success;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'ReCaptcha :attribute verification failed.';
    }
}
