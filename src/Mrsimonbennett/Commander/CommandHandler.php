<?php

namespace Mrsimonbennett\Commander;

/**
 * Interface CommandHandler
 * @package Mrsimonbennett\Commander
 */
interface CommandHandler
{
    /**
     * @param $command
     * @return mixed
     */
    public function handle($command);
}
