<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Carbon\Carbon;

class ProductExpiryTest extends TestCase
{
   public function testExpiryDate()
   {
       $expiryDate = Carbon::now()->addDays(10);
       $this->assertTrue($expiryDate->greaterThan(Carbon::now()));
   }
}
