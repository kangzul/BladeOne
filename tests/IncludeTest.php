<?php

namespace eftec\tests;

/**
 * @author G.J.W. Oolbekkink <g.j.w.oolbekkink@gmail.com>
 * @since 17/09/2018
 */
class IncludeTest extends AbstractBladeTestCase {
    /**
     * @throws \Exception
     */
    public function testInclude() {
        $this->assertEqualsIgnoringWhitespace("First... Included... Second...", $this->blade->run("include.base", []));
    }

    /**
     * @throws \Exception
     */
    public function testIncludeIf() {
        $this->markTestIncomplete("Broken, see #54");

        $this->assertEqualsIgnoringWhitespace("First... Included... Second...", $this->blade->run("include.if", ["some_var" => false]));
        $this->assertEqualsIgnoringWhitespace("First... Second...", $this->blade->run("include.if", []));
    }

    /**
     * @throws \Exception
     */
    public function testIncludeWhen() {
        $this->assertEqualsIgnoringWhitespace("First... Included... Second...", $this->blade->run("include.when", ["should_include" => true]));
        $this->assertEqualsIgnoringWhitespace("First... Second...", $this->blade->run("include.when", ["should_include" => false]));
    }
}