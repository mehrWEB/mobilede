<?php

namespace MWMobileTest;

use MWMobile\Search;
class SearchTest extends \PHPUnit_Framework_TestCase
{
    protected $search;

    protected function setUp ()
    {
        $this->search = new Search();
    }

    public function testDefaultSearch ()
    {
        $defaults = $this->search->getHttpQuery();

        $this->assertEquals(1, $defaults['page.number']);
        $this->assertGreaterThanOrEqual(10, $defaults['page.size']);
        $this->assertEquals(Search::ORDER_ASC, $defaults['sort.order']);
    }

    public function testSetInvalidOrder ()
    {
        $this->setExpectedException('InvalidArgumentException');

        $this->search->setOrder('asc');
    }

    public function testSetValidOrder ()
    {
        $this->search->setOrder(Search::ORDER_DESC);
        $this->assertSame(Search::ORDER_DESC, $this->search->getOrder());
    }
}