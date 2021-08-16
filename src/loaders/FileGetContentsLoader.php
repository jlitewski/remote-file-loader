<?php
namespace PartKeepr\RemoteFileLoader;


class FileGetContentsLoader implements RemoteFileLoaderInterface
{
    public function load($uri)
    {
        return file_get_contents($uri);
    }

    public static function isSupported()
    {
        if (ini_get("allow_url_fopen") === false) {
            return false;
        }

        return true;
    }
}
