<?php

namespace App\Telegram;

class User implements \JsonSerializable
{
    public ?int $id = null;

    public ?bool $is_bot = null;

    public ?string $first_name = null;

    public ?string $username = null;

    public ?string $language_code = null;

    public function __construct( array $data )
    {
        if( array_key_exists( 'id',$data ) )
        {
            $this->id = (int) $data['id'];
        }
        if( array_key_exists( 'is_bot',$data ) )
        {
            $this->is_bot = (bool) $data['is_bot'];
        }
        if( array_key_exists( 'first_name',$data ) )
        {
            $this->first_name = (string) $data['first_name'];
        }
        if( array_key_exists( 'username',$data ) )
        {
            $this->username = (string) $data['username'];
        }
        if( array_key_exists( 'language_code',$data ) )
        {
            $this->language_code = (string) $data['language_code'];
        }
    }

    public function jsonSerialize() : array
    {
        return array(
            'id'            => $this->id,
            'is_bot'        => $this->is_bot,
            'first_name'    => $this->first_name,
            'username'      => $this->username,
            'language_code' => $this->language_code,
        );
    }
}