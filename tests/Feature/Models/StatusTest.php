<?php

namespace Tests\Feature\Models;

use App\Models\Status;
use Tests\TestCase;

class StatusTest extends TestCase
{
    /**
     * Test Model
     */
    public function testModel()
    {
        $statusExpecteds = [
           1 => [
               '発注済' => 0,
           ],
           2 => [
               '入荷済' => 0,
           ],
           3 => [
               '出品済' => 0,
           ],
           4 => [
               '受注済' => 0,
           ],
           5 => [
               '入金済' => 0,
           ],
           6 => [
               '出荷済' => 0,
           ],
           7 => [
               '販売完了' => 0,
           ],
           11 => [
               '未入荷' => 1,
           ],
           21 => [
               '出品準備中' => 1,
           ],
           31 => [
               '未売却' => 1,
           ],
           41 => [
               '未入金' => 1,
           ],
           51 => [
               '出荷トラブル' => 1,
           ],
           61 => [
               '取引未完了' => 1,
           ],
           99 => [
               'クローゼット' => 1,
           ],
        ];

        $colorTestValues = Status::all();

        foreach ($statusExpecteds as $expectedId => $statusExpected) {
            $this->assertSame($expectedId, $colorTestValues->find($expectedId)->id);
            $colorTestCollections = $colorTestValues->where('id', $expectedId);
            foreach ($colorTestCollections as $colorTestCollection) {
                $this->assertSame(array_keys($statusExpected)[0], $colorTestCollection->name);
                $this->assertSame($statusExpected[array_keys($statusExpected)[0]], $colorTestCollection->error_flag);
            }
        }
    }
}
