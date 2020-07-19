<?php 
if(!function_exists('here_encrypt'))
{
    function here_encrypt($text)
    {
        $encrypter = \Config\Services::encrypter();
        $encode = base64_encode($encrypter->encrypt($text));
        $encode_replace = str_replace(['/', '+'], ['RkQpSZ', 'ZSpQkR'], $encode);
        $data = [
            'encode' => $encode,
            'encode_replace' => $encode_replace
        ];
        return $data;
    }
}
if(!function_exists('here_decrypt'))
{
    function here_decrypt($text)
    {
        $encrypter = \Config\Services::encrypter();
        $decode_replace = str_replace(['RkQpSZ', 'ZSpQkR'], ['/', '+'], $text);
        $decode = $encrypter->decrypt(base64_decode($decode_replace));
        return $decode;
    }
}