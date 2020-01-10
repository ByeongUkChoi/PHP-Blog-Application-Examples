<?php

namespace Pronist\PHPBlog\Tests;

use PHPUnit\Framework\TestCase;

final class LoggerTest extends TestCase
{
    /**
     * @covers \writeLog
     */
    public function testWriteLog()
    {
        $randomBytes = bin2hex(random_bytes(32));
        writeLog('info', 'TestCase::info', [ $randomBytes ]);
        $this->assertTrue(boolval(strpos(
            file_get_contents(dirname(__DIR__) . '/storage/logs/info.log'),
            $randomBytes
        )));
    }
}
