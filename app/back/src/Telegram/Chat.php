<?php

namespace App\Telegram;

class Chat implements \JsonSerializable
{
    public ?int $id = null;

    public ?string $first_name = null;

    public ?string $username = null;

    public ?string $type = null;

    public function __construct( array $data )
    {
        if( array_key_exists( 'id',$data ) )
        {
            $this->id = (int) $data['id'];
        }
        if( array_key_exists( 'first_name',$data ) )
        {
            $this->first_name = (string) $data['first_name'];
        }
        if( array_key_exists( 'username',$data ) )
        {
            $this->username = (string) $data['username'];
        }
        if( array_key_exists( 'type',$data ) )
        {
            $this->type = (string) $data['type'];
        }
    }

    public function isPrivate() : bool
    {
        return $this->type == 'private';
    }

    public function jsonSerialize() : array
    {
        return array(
            'id'         => $this->id,
            'first_name' => $this->first_name,
            'username'   => $this->username,
            'type'       => $this->type,
        );
    }
}