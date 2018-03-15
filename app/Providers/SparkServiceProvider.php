<?php

namespace App\Providers;

use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'HYDRA|studio',
        'product' => 'Your Product',
        'street' => 'Av. Eugenia #288, colonia Vertiz Narvarte',
        'location' => 'Delegación Benito Juárez, CDMX 03600',
        'phone' => '+52 (55) 5214 3568',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = 'jesus.garciav@me.com';

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
      'jesus.garciav@me.com'
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
        Spark::useStripe()->noCardUpFront()->trialDays(30);

        Spark::freePlan()
            ->features([
                'First', 'Second', 'Third'
            ]);

        Spark::plan('Basic', 'provider-id-1')
            ->price(10)
            ->features([
                'First', 'Second', 'Third'
            ]);

        Spark::collectBillingAddress();

        Spark::useTwoFactorAuth();
    }
}
