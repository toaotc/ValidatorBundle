ToaValidatorBundle
==================

This bundle integrates [ToaValidatorComponent](https://github.com/toaotc/Validator) into Symfony ~2.1 projects.

[build]: https://travis-ci.org/toaotc/ValidatorBundle
[coverage]: https://scrutinizer-ci.com/g/toaotc/ValidatorBundle/
[quality]: https://scrutinizer-ci.com/g/toaotc/ValidatorBundle/
[package]: https://packagist.org/packages/toa/validator-bundle
[dependency]: https://www.versioneye.com/user/projects/5259cef7632bac4ffe001212

[![Build Status](https://travis-ci.org/toaotc/ValidatorBundle.png)][build]
[![Code Coverage](https://scrutinizer-ci.com/g/toaotc/ValidatorBundle/badges/coverage.png?s=978032b3d96139a18865d5ce83ab0fd13a759707)][coverage]
[![Scrutinizer Quality Score](https://scrutinizer-ci.com/g/toaotc/ValidatorBundle/badges/quality-score.png?s=c7f029e4aebe6dfb6cddec7063c2033c1e30e1b8)][quality]
[![Dependency Status](https://www.versioneye.com/user/projects/5259cef7632bac4ffe001212/badge.png)][dependency]

[![Latest Stable Version](https://poser.pugx.org/toa/validator-bundle/v/stable.png "Latest Stable Version")][package]
[![Total Downloads](https://poser.pugx.org/toa/validator-bundle/downloads.png "Total Downloads")][package]

## Installation ##

Add this bundle to your `composer.json` file:

    {
        "require": {
            "toa/validator-bundle": "dev-master"
        }
    }

Register the bundle in `app/AppKernel.php`:

    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new Toa\Bundle\ValidatorBundle\ToaValidatorBundle(),
        );
    }

## Configuration ##

Enable the bundle's constraints in `app/config/config.yml`:

    # app/config/config.yml
    toa_validator:
        csv: true
        audio: true
        video: true

If you set `audio: true` or `video: true` you can configure the paths to the ffmpeg/ffprobe binaries in `app/config/parameters.yml`:

    parameters:
        toa_validator.helper.ffmpeg.binary_ffmpeg:  /usr/bin/ffmpeg  #default
        toa_validator.helper.ffmpeg.binary_ffprobe: /usr/bin/ffprobe #default

## Credits ##

The [ffmpeg.xml](Resources/config/ffmpeg.xml) is heavily inspired by [Symfony ffmpeg bundle](https://github.com/pulse00/ffmpeg-bundle).