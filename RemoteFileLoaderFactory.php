<?php
namespace PartKeepr\RemoteFileLoader;

class RemoteFileLoaderFactory
{
    public function createLoader () {
        if (FileGetContentsLoader::isSupported()) {
            return new FileGetContentsLoader();
        }

        if (CurlLoader::isSupported()) {
            return new CurlLoader();
        }

        throw new NoUsableRemoteFileLoaderException();

    }
}
