<?php

declare(strict_types=1);

namespace Nodes\ServiceAuthenticator\Console\Commands;

use Illuminate\Console\Command;
use Nodes\ServiceAuthenticator\Models\Services\Service;
use Nodes\ServiceAuthenticator\Models\Services\ServiceRepository;

class RefreshClients extends Command
{
    protected $signature = 'service-auth:clients:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh all clients';

    public function handle(ServiceRepository $serviceRepository)
    {
        $this->info('Started refresh clients');

        foreach ($serviceRepository->getClients() as $service) {
            /* @var $service Service */
            $this->info(sprintf('Refreshing '.$service->slug));

            $serviceRepository->refresh($service);
        }
    }
}
