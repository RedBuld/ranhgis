<?php

namespace App\Service;

use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TelegramSender
{
    private ?string $endpoint = null;
    public function __construct(
        private LoggerInterface $logger,
        private ParameterBagInterface $params,
        private HttpClientInterface $client
    ) {
        $this->logger = $logger;
        $this->params = $params;

        $token = $this->params->get('bot_token');
        $this->endpoint = 'https://api.telegram.org/bot'.$token.'/';
    }

    public function sendMessage(array $payload)
    {
        $response = $this->client->request(
            'POST',
            $this->endpoint.'sendMessage',
            [
                'json' => $payload
            ]
        );

        if( $response->getStatusCode() != 200 )
        {
            $this->logger->error('Error sending message', ['telegram_sender']);
            $error = $response->getContent();
            $this->logger->error($error, ['telegram_sender']);
        }
        else
        {
            $this->logger->info('Sended message', ['telegram_sender']);
            $this->logger->info("Payload:\n".json_encode($payload), ['telegram_sender']);
            $this->logger->info("Response:\n".$response->getContent(), ['telegram_sender']);
        }
        return $response;
    }

    public function replyCallbackQuery(int $query_id)
    {
        $response = $this->client->request(
            'POST',
            $this->endpoint.'answerCallbackQuery',
            [
                'json' => array(
                    'callback_query_id' => (string)$query_id,
                )
            ]
        );

        if( $response->getStatusCode() != 200 )
        {
            $this->logger->error('Error replying callback query', ['telegram_sender']);
            $error = $response->getContent();
            $this->logger->error($error, ['telegram_sender']);
        }
        else
        {
            $this->logger->info('Replied callback query', ['telegram_sender']);
            $this->logger->info("Payload:\n".json_encode($query_id), ['telegram_sender']);
            $this->logger->info("Response:\n".$response->getContent(), ['telegram_sender']);
        }
        return $response;
    }

    public function setWebhook(array $payload)
    {
        $response = $this->client->request(
            'POST',
            $this->endpoint.'setWebhook',
            [
                'json' => $payload
            ]
        );

        if( $response->getStatusCode() != 200 )
        {
            $this->logger->error('Error registering webhook', ['telegram_sender']);
            $error = $response->getContent();
            $this->logger->error($error, ['telegram_sender']);
        }
        else
        {
            $this->logger->info("Registered webhook", ['telegram_sender']);
            $this->logger->info("Payload:\n".json_encode($payload), ['telegram_sender']);
            $this->logger->info("Response:\n".$response->getContent(), ['telegram_sender']);
        }
        return $response;
    }

    public function deleteWebhook()
    {
        $token = $this->params->get('bot_token');
        // $webhook = $this->params->get('bot_webhook');

        $response = $this->client->request(
            'POST',
            $this->endpoint.'deleteWebhook'
        );

        if( $response->getStatusCode() != 200 )
        {
            $this->logger->error('Error deleting webhook', ['telegram_sender']);
            $error = $response->getContent();
            $this->logger->error($error, ['telegram_sender']);
        }
        else
        {
            $this->logger->info("Deleted webhook", ['telegram_sender']);
            $this->logger->info("Response:\n".$response->getContent(), ['telegram_sender']);
        }
        return $response;
    }
}