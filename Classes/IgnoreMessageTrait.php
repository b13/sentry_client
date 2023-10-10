<?php
declare(strict_types=1);
namespace Networkteam\SentryClient;

use Networkteam\SentryClient\Service\ConfigurationService;

trait IgnoreMessageTrait
{
    protected function shouldIgnoreMessage(string $message): bool
    {
        $regex = ConfigurationService::getIgnoreMessageRegex();
        if (!empty($regex) && !empty($message)) {
            return preg_match($regex, $message) === 1;
        }

        return false;
    }
}