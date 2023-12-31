<?php

namespace App\Telegram;

class Entity implements \JsonSerializable
{
    public ?int $offset;

    public ?int $length;

    public ?string $type;

    public ?string $command;

    public function __construct( array $data, ?string $text = '' )
    {
        if( array_key_exists( 'offset',$data ) )
        {
            $this->offset = (int) $data['offset'];
        }
        if( array_key_exists( 'length',$data ) )
        {
            $this->length = (int) $data['length'];
        }
        if( array_key_exists( 'type',$data ) )
        {
            $this->type = (string) $data['type'];
        }
        if( $this->type == 'bot_command' )
        {
            $this->command = mb_substr( $text, $this->offset+1, $this->length );
        }
    }

    public function isCommand() : bool
    {
        return $this->command !== null;
    }

    public function jsonSerialize() : array
    {
        return array(
            'offset'  => $this->offset,
            'length'  => $this->length,
            'type'    => $this->type,
            'command' => $this->command,
        );
    }
}