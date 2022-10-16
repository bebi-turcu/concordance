<?php

namespace Tests\Unit;

use App\Services\Concordance;
use PHPUnit\Framework\TestCase;

class ConcordanceTest extends TestCase
{
    private const TEXT = "This is the first sentence.\nAnd the second sentence follows.";
    private const WORD = 'sentence';
    private const WORD_FREQUENCY = 2;
    private const WORD_SENTENCES = '1,2';
    private const WORDS_COUNT = 8;
    private $concordance;

    public function testAllUniqueWords(): void
    {
        $this->assertIsArray($this->concordance);
        $this->assertCount(self::WORDS_COUNT, $this->concordance);
    }

    public function testSortAlphabetically(): void
    {
        $sorted = $this->concordance;
        ksort($sorted);
        $this->assertEquals($sorted, $this->concordance);
    }

    public function testFindWord(): void
    {
        $this->assertArrayHasKey(self::WORD, $this->concordance);
    }

    public function testWordFrequency(): void
    {
        $this->assertEquals(self::WORD_FREQUENCY, $this->concordance[self::WORD]['frequency']);
    }

    public function testWordOccurrences(): void
    {
        $this->assertEquals(self::WORD_SENTENCES, $this->concordance[self::WORD]['sentences']);
    }

    protected function setUp(): void
    {
        $this->concordance = Concordance::generate(self::TEXT);
    }
}
