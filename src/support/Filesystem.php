<?php

namespace agilov\docdocsdk\support;

/**
 * Class Filesystem
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class Filesystem
{
    /**
     * Creates temporary directory for debugging
     */
    public static function createDir($path)
    {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
    }

    /**
     * @param $path
     */
    public static function removeDir($path)
    {
        if (!file_exists($path)) {
            return;
        }

        $files = glob($path . '/*');
        foreach ($files as $file) {
            is_dir($file) ? static::removeDir($file) : unlink($file);
        }
        rmdir($path);
    }
}
