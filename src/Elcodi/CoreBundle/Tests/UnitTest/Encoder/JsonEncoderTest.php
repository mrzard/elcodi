<?php

/**
 * This file is part of the Elcodi package.
 *
 * Copyright (c) 2014 Elcodi.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @author Aldo Chiecchia <zimage@tiscali.it>
 */

namespace Elcodi\CoreBundle\Tests\UnitTest\Encoder;

use PHPUnit_Framework_TestCase;

use Elcodi\CoreBundle\Encoder\JsonEncoder;

/**
 * Class JsonEncoderTest
 */
class JsonEncoderTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test json encode
     *
     * @dataProvider dataEncodeDecode
     */
    public function testEncode($data, $dataEncoded)
    {
        $encoder = new JsonEncoder();

        $this->assertEquals(
            $encoder->encode($data),
            $dataEncoded
        );
    }

    /**
     * Test json decode
     *
     * @dataProvider dataEncodeDecode
     */
    public function testDecode($data, $dataEncoded)
    {
        $encoder = new JsonEncoder();

        $this->assertEquals(
            $encoder->decode($dataEncoded),
            $data
        );
    }

    /**
     * data provider for json encode
     */
    public function dataEncodeDecode()
    {
        return [
            [null, 'null'],
            [true, 'true'],
            [false, 'false'],
            ['foo', '"foo"'],
            [array('foo'), '["foo"]'],
        ];
    }
}
