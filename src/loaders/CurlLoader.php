<?php
namespace PartKeepr\RemoteFileLoader;


class CurlLoader implements RemoteFileLoaderInterface
{

    public function load($uri)
    {
        //Initiate the cURL handler
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $uri);
        curl_setopt($ch, CURLOPT_HEADER, true); //We want this for error checking
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //We want the result, not a boolean

        $file = curl_exec($ch); //Have cURL do it's thing

        //Make sure that what we got back is valid
        if(false === $file) {
            throw new FileLoadException("Curl ran into an error loading a file from '"+$uri+"'");
        }

        if(curl_errno($ch)) { //Check to make sure cURL didn't itself throw an error
            throw new FileLoadException(curl_error($ch));
        }

        //TODO: Do more error checking with the cURL header information

        curl_close($ch); //Close the handle

        //Return the file
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
