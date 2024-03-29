<?php

declare(strict_types=1);
/**
 * test.
 *
 * @link     https://www.guandeng.io
 */

namespace HyperfComponent\Jwt\Commands;

use Hyperf\Command\Command as HyperfCommand;
use Hyperf\Contract\ConfigInterface;
use Symfony\Component\Console\Input\InputOption;

abstract class AbstractGenCommand extends HyperfCommand
{
    protected ConfigInterface $config;

    protected string $description;

    public function __construct(ConfigInterface $config)
    {
        parent::__construct();
        $this->config = $config;
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription($this->description);
        $this->addOption('show', 's', InputOption::VALUE_NONE, 'Display the key instead of modifying files');
        $this->addOption('always-no', null, InputOption::VALUE_NONE, 'Skip generating key if it already exists');
        $this->addOption('force', 'f', InputOption::VALUE_NONE, 'Skip confirmation when overwriting an existing key');
    }

    /**
     * @param null|mixed $default
     *
     * @return null|mixed
     */
    protected function getOption(string $name, $default = null)
    {
        $result = $this->input->getOption($name);
        return empty($result) ? $default : $result;
    }

    protected function envFilePath(): string
    {
        return BASE_PATH . '/.env';
    }
}
