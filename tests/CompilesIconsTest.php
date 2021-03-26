<?php

declare(strict_types=1);

namespace Tests;

use Orchestra\Testbench\TestCase;
use BladeUI\Icons\BladeIconsServiceProvider;
use Codeat3\BladeEvaIcons\BladeEvaIconsServiceProvider;

class CompilesIconsTest extends TestCase
{
    /** @test */
    public function it_compiles_a_single_anonymous_component()
    {
        $result = svg('ev-activity')->toHtml();

        // Note: the empty class here seems to be a Blade components bug.
        $expected = <<<'SVG'
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g data-name="Layer 2"><g><g data-name="activity"><rect transform="translate(24 0) rotate(90)"/><path d="M14.33,20h-.21a2,2,0,0,1-1.76-1.58L9.68,6,6.92,12.4A1,1,0,0,1,6,13H3a1,1,0,0,1,0-2H5.34L7.85,5.21a2,2,0,0,1,3.79.38L14.32,18l2.76-6.38A1,1,0,0,1,18,11h3a1,1,0,0,1,0,2H18.66l-2.51,5.79A2,2,0,0,1,14.33,20Z"/></g></g></g></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_classes_to_icons()
    {
        $result = svg('ev-activity', 'w-6 h-6 text-gray-500')->toHtml();

        $expected = <<<'SVG'
            <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g data-name="Layer 2"><g><g data-name="activity"><rect transform="translate(24 0) rotate(90)"/><path d="M14.33,20h-.21a2,2,0,0,1-1.76-1.58L9.68,6,6.92,12.4A1,1,0,0,1,6,13H3a1,1,0,0,1,0-2H5.34L7.85,5.21a2,2,0,0,1,3.79.38L14.32,18l2.76-6.38A1,1,0,0,1,18,11h3a1,1,0,0,1,0,2H18.66l-2.51,5.79A2,2,0,0,1,14.33,20Z"/></g></g></g></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    /** @test */
    public function it_can_add_styles_to_icons()
    {
        $result = svg('ev-activity', ['style' => 'color: #555'])->toHtml();

        $expected = <<<'SVG'
            <svg style="color: #555" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g data-name="Layer 2"><g><g data-name="activity"><rect transform="translate(24 0) rotate(90)"/><path d="M14.33,20h-.21a2,2,0,0,1-1.76-1.58L9.68,6,6.92,12.4A1,1,0,0,1,6,13H3a1,1,0,0,1,0-2H5.34L7.85,5.21a2,2,0,0,1,3.79.38L14.32,18l2.76-6.38A1,1,0,0,1,18,11h3a1,1,0,0,1,0,2H18.66l-2.51,5.79A2,2,0,0,1,14.33,20Z"/></g></g></g></svg>
            SVG;

        $this->assertSame($expected, $result);
    }

    protected function getPackageProviders($app)
    {
        return [
            BladeIconsServiceProvider::class,
            BladeEvaIconsServiceProvider::class,
        ];
    }
}
