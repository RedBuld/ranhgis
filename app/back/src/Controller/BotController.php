<?php
namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\TelegramSender;
use App\Telegram\Message;
use App\Telegram\CallbackQuery;

#[Route('/bot', name: 'bot_')]
class BotController extends AbstractController
{
    public function __construct(
        private LoggerInterface $logger,
        private TelegramSender $tg
    ) {
        // 
    }

    #[Route('/', name: 'index', methods:['POST'])]
    public function index(Request $request): Response
    {
        $payload = json_decode($request->getContent(), true);

        $this->logger->info( $request->getContent() );

        if( array_key_exists( 'callback_query', $payload ) )
        {
            $message = new CallbackQuery( $payload['callback_query'] );
            $this->tg->replyCallbackQuery( $message->id );
        }
        elseif( array_key_exists( 'message', $payload ) )
        {
            $message = new Message( $payload['message'] );
        }
        $this->logger->info( json_encode( $message ) );

        if( $message instanceof Message )
        {
            $reply = array(
                'chat_id' => $message->chat->id,
                'text' => $message->text,
                'reply_markup' => [
                    'inline_keyboard' => [
                        [
                            [
                                "text" => "Yes",
                                "callback_data" => "yes"
                            ],
                            [
                                "text" => "No",
                                "callback_data" => "no"
                            ],
                            [
                                "text" => "Stop",
                                "callback_data" => "stop"
                            ],
                        ],
                    ],
                ],
            );
            $this->tg->sendMessage($reply);
        }

        if( $message instanceof CallbackQuery )
        {
            $reply = array(
                'chat_id' => $message->message->chat->id,
                'text' => $message->data
            );
            $this->tg->sendMessage($reply);
        }

        return new Response();
    }

    #[Route('/register-webhook', name: 'register-webhook', methods:['GET','POST'])]
    public function registerWebhook(Request $request): Response
    {
        // $token = $this->getParameter('bot_token');
        $webhook = $this->getParameter('bot_webhook');

        $delete = $this->tg->deleteWebhook();
        $set = $this->tg->setWebhook(
            [
                'url' => $webhook,
                'max_connections' => 1,
            ]
        );

        $statusCode = $set->getStatusCode();
        // $statusCode = 200
        $contentType = $set->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $set->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        // $content = $set->toArray();

        return new Response($content, $statusCode, ['Content-Type'=>$contentType]);
    }
}