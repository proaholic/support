<?php
/**
 * Created by Cestbon.
 * Author Cestbon <734245503@qq.com>
 * Date 2021/1/27 13:41
 */

namespace Chenpkg\Support;

class RSA
{
    /**
     * @param $content
     * @param $privateKey
     * @return string
     */
    public static function sign($content, $privateKey)
    {
        $privateKey = "-----BEGIN RSA PRIVATE KEY-----\n" .
            wordwrap($privateKey, 64, "\n", true) .
            "\n-----END RSA PRIVATE KEY-----";

        $key = openssl_pkey_get_private($privateKey);

        openssl_sign($content, $signature, $key, OPENSSL_ALGO_SHA256);
        openssl_free_key($key);
        return base64_encode($signature);
    }

    /**
     * @param $content
     * @param $sign
     * @param $publicKey
     * @return int
     */
    public static function verify($content, $sign, $publicKey)
    {
        $publicKey = "-----BEGIN PUBLIC KEY-----\n" .
            wordwrap($publicKey, 64, "\n", true) .
            "\n-----END PUBLIC KEY-----";

        $key = openssl_get_publickey($publicKey);
        $ok = openssl_verify($content, base64_decode($sign), $key, OPENSSL_ALGO_SHA256);
        openssl_free_key($key);
        return $ok;
    }
}