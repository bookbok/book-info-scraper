<?php

namespace Tests\Unit\Information\ImmutableAuthor;

use BookBok\BookInfoScraper\Information\ImmutableAuthor;
use PHPUnit\Framework\TestCase;

class WithRolesTest extends TestCase
{
    /**
     * @dataProvider dataProviderPossibleToSetValidValueAndReturnCloneInstance
     * @param string[]|null $value
     * @return void
     */
    public function testPossibleToSetValidValueAndReturnCloneInstance(?array $value): void
    {
        $author = (new ImmutableAuthor())->withRoles(["role99"]);
        $cloneAuthor = $author->withRoles($value);

        $this->assertSame(["role99"], $author->getRoles());
        $this->assertSame($value, $cloneAuthor->getRoles());
        $this->assertNotSame($cloneAuthor, $author);
    }

    /**
     * @return array<array{string[]|null}>
     */
    public function dataProviderPossibleToSetValidValueAndReturnCloneInstance(): array
    {
        return [
            [["role1", "role2"]],
            [null],
        ];
    }

    /**
     * @dataProvider dataProviderThrowExceptionWhenSetInvalidValue
     * @param mixed $value
     * @param string $message
     * @return void
     */
    public function testThrowExceptionWhenSetInvalidValue($value, string $message): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage($message);

        (new ImmutableAuthor())->withRoles($value);
    }

    /**
     * @return array<array{string[],string}>
     */
    public function dataProviderThrowExceptionWhenSetInvalidValue(): array
    {
        return [
            "Empty array" => [
                [],
                "Cannot set empty array."
            ],
            "Associative array with number index" => [
                [1 => "role1", 2 => "role2"],
                "Cannot set associative array."
            ],
            "Associative array with string index" => [
                ["a" => "role1", "b" => "role2"],
                "Cannot set associative array."
            ],
            "Contain empty string" => [
                ["role1", ""],
                "Cannot set empty string."
            ],
        ];
    }
}
