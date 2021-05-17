<?php

namespace App\Test;

use App\Entity\Category;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CategoryTest extends KernelTestCase
{
    private $validator;

    public function setUp(): void
    {
        $kernel = self::bootKernel();
        $this->validator = $kernel->getContainer()->get('validator');
    }

    public function testValidCategory()
    {
        $category = new Category();
        $category->setName('test');
        $category->setContent('test1');
        $category->setCreatedAt(new DateTime());
        $category->setSlug('test');
        $error = $this->validator->validate($category);//retourne une valeur (0 ou +)
        $this->assertCount(0, $error);
        $this->assertSame('test', $category->getName());
    }

    public function testInvalidCategoryBecauseWithName()
    {
        $category = new Category();
        $category->setContent('test1');
        $category->setCreatedAt(new DateTime());
        $category->setSlug('test');
        $error = $this->validator->validate($category);//retourne une valeur (0 ou +)
        $this->assertCount(1, $error);
    }

    public function testValidateSlug()
    {
        $category = new Category();
        $category->setName('test');
        $category->setContent('test1');
        $category->setCreatedAt(new DateTime());
        $category->setSlug($category->getName());
        $error = $this->validator->validate($category);//retourne une valeur (0 ou +)
        $this->assertSame($category->getName(), $category->getslug());
    }
}