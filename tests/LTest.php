<?php

use LoreSjoberg\L\L;
use PHPUnit\Framework\TestCase;

class LTest extends TestCase
{
    public function testPdoDie()
    {
        $stub = $this->createStub(PDO::class);
        $stub->method('errorInfo')->willReturn(['', '', 'This is the error.']);
        $output = L::pdoError($stub);
        $this->assertEquals("Error in LoreSjoberg\L\L:12: This is the error.\n", $output);
    }


    public function testGetRowBySlug()
    {
        $rows = [
            [
                'id' => 8,
                'slug' => 'ford-dip',
                'moniker' => 'Ford DIP',

            ],
            [
                'id' => 9,
                'slug' => 'foo-bar',
                'moniker' => 'Foo Bar',

            ],
            [
                'id' => 10,
                'slug' => 'iolta',
                'moniker' => 'IOLTA',

            ]
        ];

        $row = L::findRowBySlug($rows, 'iolta');
        $this->assertEquals($rows[2], $row);
    }
}
