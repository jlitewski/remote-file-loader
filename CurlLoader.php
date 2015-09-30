<?php
namespace PartKeepr\RemoteFileLoader;


class CurlLoader implements RemoteFileLoaderInterface
{

    public function load($uri)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $uri);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $file = curl_exec($ch);
        curl_close($ch);

        return $file;
    }

    public static function isSupported()
    {
        if (!function_exists("curl_init")) {
            return false;
        }

        return true;
    }
}
