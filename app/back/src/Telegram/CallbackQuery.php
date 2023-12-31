<?php

namespace App\Telegram;

class CallbackQuery implements \JsonSerializable
{
    public ?int $id = null;
    
    public ?User $from = null;

    public ?Message $message = null;
	
    public ?string $chat_instance = null;
	
    public ?string $data = null;

    public function __construct( array $data )
    {
        if( array_key_exists( 'id',$data ) )
        {
            $this->id = (int) $data['id'];
        }
        if( array_key_exists( 'from',$data ) )
        {
            $this->from = new User( $data['from'] );
        }
        if( array_key_exists( 'message',$data ) )
        {
            $this->message = new Message( $data['message'] );
        }
        if( array_key_exists( 'chat_instance',$data ) )
        {
            $this->chat_instance = (string) $data['chat_instance'];
        }
        if( array_key_exists( 'data',$data ) )
        {
            $this->data = (string) $data['data'];
        }
    }

    public function jsonSerialize() : array
    {
        return array(
            'id'            => $this->id,
            'from'          => $this->from,
            'message'       => $this->message,
            'chat_instance' => $this->chat_instance,
            'data'          => $this->data,
        );
    }
}