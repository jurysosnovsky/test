<?php

namespace App\Command;

use App\Service\Statistic\Country\Get\BaseInterface;
use App\Service\Statistic\Country\Strategy\CacheKey;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:update-cache',
    description: 'Update cache.',
)]
final class UpdateCache extends Command
{
    private readonly CacheKey $key;

    public function __construct(
        private readonly \Redis $redis,
        private readonly BaseInterface $redisAccessor,
        string $name = null,
    )
    {
        parent::__construct($name);
        $this->key = new CacheKey();
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $output->writeln('Start to update cache...');
            $data = $this->redisAccessor->get();
            $this->redis->set(
                $this->key->get(),
                json_encode($data),
            );
            $output->writeln('Cache updated!');
            return Command::SUCCESS;
        } catch (\Throwable $exception) {
            return Command::FAILURE;
        }
    }

}