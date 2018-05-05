<?php

namespace tests\unit\support;

use agilov\docdocsdk\support\Filesystem;

/**
 * Class FilesystemTest
 *
 * vendor/bin/codecept run unit tests/unit/support/FilesystemTest
 *
 * @author Roman Agilov <agilovr@gmail.com>
 */
class FilesystemTest extends \Codeception\Test\Unit
{
    /**
     * vendor/bin/codecept run unit tests/unit/support/FilesystemTest:testCreateRemoveDir
     */
    public function testCreateRemoveDir()
    {
        $dir = '/tmp/docdoc';
        Filesystem::createDir($dir);
        expect(file_exists($dir))->true();

        file_put_contents($dir . '/test', 'test');
        Filesystem::removeDir($dir);
        expect(file_exists($dir))->false();
    }
}
