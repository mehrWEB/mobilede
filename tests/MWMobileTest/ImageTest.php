<?php

namespace MWMobileTest;

use MWMobile\Image;

class ImageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Image
     */
    protected $image;
    
    protected function setUp ()
    {
        $this->image = new Image();
    }
    
    public function testConstructWithUrls ()
    {
        $urls = array(
            's' => 'http://some-url/s.jpg',
            'm' => 'http://some-url/medium.jpg',
            'icon' => 'http://some-url/iconimage.jpg'
        );
        $this->image = new Image($urls);
        $this->assertCount(3, $this->image->getUrls());
    }
    
    public function testGetUrlViaSize ()
    {
        $url = 'http://some-url/toimage.png';
        $this->image->setUrl('some-size', $url);
        
        $this->assertSame($url, $this->image->getUrl('some-size'));
    }
}