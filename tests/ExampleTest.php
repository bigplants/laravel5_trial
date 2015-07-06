<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Test Blog');
    }

    function testArticle()
    {
        $this->visit('/articles/')->see('Test Blog');
    }

    function testShow()
    {
        $this->visit('/articles/show/1')->see('Test Blog');
    }

}
