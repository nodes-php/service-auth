<?php
declare(strict_types = 1);

namespace Nodes\ServiceAuthenticator\Console\Commands;

use Illuminate\Console\Command;
use Nodes\ServiceAuthenticator\Models\Services\Service;
use Nodes\ServiceAuthenticator\Models\Services\ServiceRepository;

class Handshake extends Command
{
    protected $signature = 'service-auth:handshake';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Handshake with all services';

    public function handle(ServiceRepository $serviceRepository)
    {
        $this->info('Started ' . __CLASS__);

        foreach($serviceRepository->get() as $service) {
            /** @var $service Service */
            $serviceRepository->handshake($service);


        }

        $this->info('Finished ' . __CLASS__);
    }
}
