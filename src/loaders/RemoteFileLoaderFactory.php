<?php
namespace PartKeepr\RemoteFileLoader;

class RemoteFileLoaderFactory
{

    /**
     * A custom remote file loader if one is supplied
     * @param RemoteFileLoaderInterface $customLoader
     */
    protected RemoteFileLoaderInterface $customLoader;

    public function __construct($customLoaderImpl = null) {
        $this->customLoader = $customLoaderImpl;
    }

    public function createLoader () {

        if($this->customLoader != null) {
            if($this->customLoader::isSupported()) { //This really shouldn't be needed, but better safe than sorry
                return $this->customLoader;
            }
        }

        if (FileGetContentsLoader::isSupported()) {
            return new FileGetContentsLoader();
        }

        if (CurlLoader::isSupported()) {
            return new CurlLoader();
        }

        //TODO: Expand this out a little bit more just in case it fails for the End User to take steps to fix it
        throw new NoUsableRemoteFileLoaderException();

    }
}
