<?php

namespace Interworx\Nodeworx;

use Interworx;

/**
 * Trait Packages
 *
 * @package Nodeworx
 */
class Packages extends Interworx\WorxBase
{
    /**
     * List the packages on the server
     *
     * @return array
     */
    public function list(): array
    {
        $result = $this->listDetails();
        $packages = [];
        if($result) {
            foreach($result as $package) {
                $packages[] = $package['name'];
            }

            return $packages;
        }


        return $result;
    }

    /**
     * List the packages details on the server
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listDetails()
    {
        return $this->parent->call('nodeworx', '/packages', __FUNCTION__);
    }

    /**
     * Check if the package exists
     *
     * @param string $name Name of the package on the server
     * @return bool
     */
    public function exists(string $name): bool
    {
        $packages = $this->listDetails();
        $packageExists = false;
        if($packages) {
            foreach($packages as $package) {
                if($package['name'] === $name) {
                    $packageExists = true;
                    break;
                }
            }
        }

        return $packageExists;
    }
}