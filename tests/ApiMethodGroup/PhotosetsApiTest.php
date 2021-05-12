<?php

namespace Jooservices\PhpFlickr\Tests\ApiMethodGroup;

use Jooservices\PhpFlickr\Tests\TestCase;

class PhotosetsApiTest extends TestCase
{
    protected $testPhotoId;

    protected function setUp(): void
    {
        parent::setUp();
        $flickr = $this->getFlickr(true);
        $testFilename = dirname(__DIR__) . '/../examples/Agateware_Example.JPG';
        $uploaded = $flickr->uploader()->upload($testFilename);
        $this->testPhotoId = $uploaded['photoid'];
    }

    protected function tearDown(): void
    {
        $this->getFlickr(true)->photos_delete($this->testPhotoId);
    }

    public function testCreate()
    {
        $flickr = $this->getFlickr(true);
        $photoset = $flickr->photosets()->create('Test album', 'The description.', $this->testPhotoId);
        static::assertEquals(['id', 'url'], array_keys($photoset));
        $photos = $flickr->photosets()->getPhotos($photoset['id']);
        static::assertCount(1, $photos['photo']);
        static::assertEquals($this->testPhotoId, $photos['photo'][0]['id']);
    }

    public function testAddPhotoToNoneExistantPhotoset()
    {
        static::expectExceptionMessage('Photoset not found');
        $this->getFlickr(true)->photosets()->addPhoto('xxx', $this->testPhotoId);
    }
}
