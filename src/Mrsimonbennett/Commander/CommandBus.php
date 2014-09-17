<?php
namespace Mrsimonbennett\Commander;

use Illuminate\Foundation\Application;

/**
 * Class CommandBus
 * @package Mrsimonbennett\Commander
 */
class CommandBus
{
    /**
     * @var CommandTranslator
     */
    protected $commandTranslator;

    /**
     * @var \Illuminate\Foundation\Application
     */
    private $application;

    /**
     * @param CommandTranslator          $commandTranslator
     * @param Application                $application
     */
    public function __construct(CommandTranslator $commandTranslator, Application $application)
    {
        $this->commandTranslator = $commandTranslator;
        $this->application = $application;
    }

    /**
     * @param $command
     * @return mixed
     * @throws \Exception
     */
    public function execute($command)
    {
        $handler = $this->commandTranslator->toCommandHandler($command);

        return $this->application->make($handler)->handle($command);
    }
} 