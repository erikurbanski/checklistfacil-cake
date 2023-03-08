<?php

namespace App\Console\Commands;

use App\Http\Services\CakeService;
use App\Jobs\SendEmailsJob;
use App\Models\Client;
use App\Notifications\SendEmailClientCake;
use Illuminate\Console\Command;
use App\Http\Services\ClientService;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(CakeService $cakeService, SendEmailsJob $sendEmailsJob): void
    {

        $clients = Client::all()->where("email_sent", 0);

        foreach ($clients as $client) {
            $cakeData = $cakeService->findCake($client->cake_id);
            $quantityTotalCake = $cakeData->quantity;

            if ($quantityTotalCake > 0) {
                $sendEmailsJob::dispatch($client);
                $client->update(['email_sent' => 1]);
            }
        }

    }
}
