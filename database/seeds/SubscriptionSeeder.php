<?php

use Illuminate\Database\Seeder;
use App\Models\Subscription;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')->delete();

        $subscriptions = [
            [
                'id' => 1,
                'subscription_name' => 'Gold',
                'price' => 20,
                'valid_for' => 'Valid for 30 days',
                'currency' =>  'USD',
                'total_job_apply' => 02
            ],

            [
                'id' => 2,
                'subscription_name' => 'Diamond',
                'price' => 40,
                'valid_for' => 'Valid for 30 days',
                'currency' =>  'USD',
                'total_job_apply' => 05
            ],
            [
                'id' => 3,
                'subscription_name' => 'Platinum',
                'price' => 60,
                'valid_for' => 'Valid for 30 days',
                'currency' =>  'USD',
                'total_job_apply' => 10
            ]
        ];

        Subscription::insert($subscriptions);
    }
}
