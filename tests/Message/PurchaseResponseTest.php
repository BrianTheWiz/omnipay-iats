<?php

namespace Omnipay\iATS\Message;

use Omnipay\Tests\TestCase;

class ResponseTest extends TestCase
{
    public function testSuccess()
    {
        $response = new PurchaseResponse(
            $this->getMockRequest(),
            array('reference' => 'abc123', 'success' => 1, 'message' => 'Success')
        );

        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('abc123', $response->getTransactionReference());
        $this->assertSame('Success', $response->getMessage());
    }

    public function testFailure()
    {
        $response = new PurchaseResponse(
            $this->getMockRequest(),
            array('reference' => 'abc123', 'success' => 0, 'message' => 'Failure')
        );

        $this->assertFalse($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertSame('abc123', $response->getTransactionReference());
        $this->assertSame('Failure', $response->getMessage());
    }
}