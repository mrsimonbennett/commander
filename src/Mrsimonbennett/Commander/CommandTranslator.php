<?php


namespace Mrsimonbennett\Commander;

/**
 * Class CommandTranslator
 * @package Mrsimonbennett\Commander
 */
class CommandTranslator
{
    /**
     * @param $command
     * @return mixed
     * @throws \Exception
     */
    public function toCommandHandler($command)
    {
        $handler = $this->str_lreplace('Request', 'Handler', get_class($command));

        if (!class_exists($handler)) {
            throw new \Exception("Command Handler [$handler] does not exist");
        }

        return $handler;
    }

    /**
     * @param $search
     * @param $replace
     * @param $subject
     * @return mixed
     */
    public function str_lreplace($search, $replace, $subject)
    {
        $pos = strrpos($subject, $search);

        if ($pos !== false) {
            $subject = substr_replace($subject, $replace, $pos, strlen($search));
        }

        return $subject;
    }
} 