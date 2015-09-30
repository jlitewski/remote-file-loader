<?php
namespace PartKeepr\RemoteFileLoader;

interface RemoteFileLoaderInterface
{
    /**
     * Loads the file from the given URI and returns the contents.
     *
     * @param $uri string The URI to load
     *
     * @return string The binary data
     */
    public function load ($uri);

    /**
     * Checks if the given file loader is supported
     *
     * @return boolean
     */
    public static function isSupported ();
}
