<?php

namespace Tests\Unit\Books;


use Tests\CreatesApplication;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

abstract class BaseBookTest extends TestCase
{

    use CreatesApplication, DatabaseMigrations;

    protected $headers = ['Accept' => 'application/json'];
    protected $perPage = 10;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:refresh --seed');

    }
}