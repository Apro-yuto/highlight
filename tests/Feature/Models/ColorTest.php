<?php

namespace Tests\Feature\Models;

use App\Models\Color;
use Tests\TestCase;

class ColorTest extends TestCase
{
    /**
     * Test Model
     */
    public function testModel()
    {
        $colorExpecteds = [
        1 => [
              'ホワイト' => '#ffffff',
        ],
        2 => [
              'ブラック' => '#000000',
        ],
        3 => [
              'グレー' => '#aab2be',
        ],
        4 => [
              'ブラウン' => '#81604c',
        ],
        5 => [
              'ベージュ' => '#e0d1ad',
        ],
        6 => [
              'グリーン' => '#9ed563',
        ],
        7 => [
              'ブルー' => '#4dbee9',
        ],
        8 => [
              'パープル' => '#ad8eef',
        ],
        9 => [
              'イエロー' => '#fed14c',
        ],
        10 => [
              'ピンク' => '#f8afd7',
        ],
        11 => [
              'レッド' => '#ef5663',
        ],
        12 => [
              'オレンジ' => '#fed14c',
        ],
        13 => [
              'シルバー' => '#bfbfbf',
        ],
        14 => [
              'ゴールド' => '#e3c64b',
        ],
        15 => [
              '柄' => null,
        ],
        16 => [
              'その他' => null,
        ],
        ];

        $colorTestValues = Color::all();

        foreach ($colorExpecteds as $expectedId => $colorExpected) {
            $this->assertSame($expectedId, $colorTestValues->find($expectedId)->id);
            $colorTestCollections = $colorTestValues->where('id', $expectedId);
            foreach ($colorTestCollections as $colorTestCollection) {
                $this->assertSame(array_keys($colorExpected)[0], $colorTestCollection->name);
                $this->assertSame($colorExpected[array_keys($colorExpected)[0]], $colorTestCollection->code);
            }
        }
    }
}
