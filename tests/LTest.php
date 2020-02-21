<?php

use LoreSjoberg\L\L;
use PHPUnit\Framework\TestCase;

class LTest extends TestCase
{
    public function testPdoDie()
    {
        $stub = $this->createStub(PDO::class);
        $stub->method('errorInfo')->willReturn(['','','This is the error.']);
        $output = L::pdoError($stub);
        $this->assertEquals("Error in LoreSjoberg\L\L:13: This is the error.\n", $output);
    }


}
