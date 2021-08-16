<?php
namespace PartKeepr\RemoteFileLoader;

interface RemoteFileLoaderInterface
{
    /**
     * Loads the file from the given URI and returns the contents.
     *
     * @param $uri string The URI to load
     * 
     * @throws FileLoadException If something happens while loading the URI
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
