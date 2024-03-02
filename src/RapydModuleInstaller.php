<?php


namespace Zofe\RapydModuleInstaller;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
use Composer\Repository\InstalledRepositoryInterface;
use React\Promise\PromiseInterface;
use Zofe\RapydModuleInstaller\Exceptions\RapydModuleInstallerException;

class RapydModuleInstaller extends LibraryInstaller
{
    const DEFAULT_ROOT = "Modules";

    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        return $this->getBaseInstallationPath() . '/' . $this->getModuleName($package);
    }

    /**
     * Get the base path that the module should be installed into.
     * Defaults to Modules/ and can be overridden in the module's composer.json.
     *
     * @return string
     */
    protected function getBaseInstallationPath()
    {
        if (!$this->composer || !$this->composer->getPackage()) {
            return 'app/'.self::DEFAULT_ROOT;
        }

        $extra = $this->composer->getPackage()->getExtra();

        if (!$extra || empty($extra['module-dir'])) {
            return 'app/'.self::DEFAULT_ROOT;
        }

        return $extra['module-dir'];
    }

    /**
     * Get the module name, i.e. "myvendor/something-module" will be transformed into "Something"
     *
     * @param PackageInterface $package Compose Package Interface
     *
     * @return string Module Name
     *
     * @throws RapydModuleInstallerException
     */
    protected function getModuleName(PackageInterface $package)
    {
        $name = $package->getPrettyName();
        $split = explode("/", $name);

        if (count($split) !== 2) {
            throw RapydModuleInstallerException::fromInvalidPackage($name);
        }

        $splitNameToUse = explode("-", $split[1]);

        if (count($splitNameToUse) < 2) {
            throw RapydModuleInstallerException::fromInvalidPackage($name);
        }

        if (array_pop($splitNameToUse) !== 'module') {
            throw RapydModuleInstallerException::fromInvalidPackage($name);
        }

        return implode('', array_map('ucfirst', $splitNameToUse));
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'rapyd-module' === $packageType;
    }

    public function update(InstalledRepositoryInterface $repo, PackageInterface $initial, PackageInterface $target)
    {
        return;
        /*$question = sprintf(
            '<question>Do you want to update package %s from version %s to %s?</question> YOU WILL LOSE ANY CUSTOMIZATION YOU HAVE MADE [y/N] ',
            $initial->getPrettyName(),
            $initial->getPrettyVersion(),
            $target->getPrettyVersion()
        );

        if (!$this->io->askConfirmation($question)) {
            return;
        }

        parent::update($repo, $initial, $target);
        */

    }
}
