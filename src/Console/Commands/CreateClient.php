<?php
declare(strict_types = 1);

namespace Nodes\ServiceAuthenticator\Console\Commands;

use Illuminate\Console\Command;
use Nodes\ServiceAuthenticator\Models\Services\Service;
use Nodes\ServiceAuthenticator\Models\Services\ServiceRepository;

class CreateClient extends Command
{
    protected $signature = 'service-auth:clients:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new client';

    public function handle(ServiceRepository $serviceRepository)
    {
        $slug = $this->ask('Enter slug');
        $baseUrl = $this->askForBaseUrl();

        $serviceRepository->create([
            'slug'     => $slug,
            'base_url' => $baseUrl,
            'token'    => str_random(36),
            'type'     => Service::TYPE_CLIENT,
        ]);

        $this->info('Added service');
    }

    /**
     * askForBaseUrl
     *
     * @author Casper Rasmussen <cr@nodes.dk>
     * @access public
     * @return string
     */
    private function askForBaseUrl() : string
    {
        $baseUrl = $this->ask('Enter base url');
        if (!filter_var($baseUrl, FILTER_VALIDATE_URL)) {
            $this->error('Invalid url, please try again');

            return $this->askForBaseUrl();
        }

        return $baseUrl;
    }
}
