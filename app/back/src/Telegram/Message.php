<?php

namespace App\Telegram;

class Message implements \JsonSerializable
{
    public ?int $message_id = null;

    public ?string $type = 'message';

    public ?Entity $command = null;
    
    public ?User $from = null;

    public ?Chat $chat = null;

    public ?\DateTimeInterface $date = null;
    
    public ?string $text = null;

    public ?array $entities = null;

    public function __construct( array $data )
    {
        if( array_key_exists( 'message_id',$data ) )
        {
            $this->message_id = (int) $data['message_id'];
        }
        if( array_key_exists( 'text',$data ) )
        {
            $this->text = (string) $data['text'];
        }
        if( array_key_exists( 'date',$data ) )
        {
            $this->date = \DateTimeImmutable::createFromFormat( 'U', $data['date'] );
        }
        if( array_key_exists( 'from',$data ) )
        {
            $this->from = new User( $data['from'] );
        }
        if( array_key_exists( 'chat',$data ) )
        {
            $this->chat = new Chat( $data['chat'] );
        }
        if( array_key_exists( 'entities',$data ) )
        {
            $this->entities = array();
            foreach( $data['entities'] as $entity )
            {
                $entity = new Entity( $entity, $this->text );
                if( $entity->isCommand() )
                {
                    $this->type = 'command';
                    $this->command = $entity;
                }
                $this->entities[] = $entity;
            };
        }
    }

    public function isCommand() : bool
    {
        return $this->command !== null;
    }

    public function jsonSerialize() : array
    {
        return array(
            'message_id' => $this->message_id,
            'type'       => $this->type,
            'command'    => $this->command,
            'from'       => $this->from,
            'chat'       => $this->chat,
            'date'       => $this->date->format('U'),
            'text'       => $this->text,
            'entities'   => $this->entities,
        );
    }
}