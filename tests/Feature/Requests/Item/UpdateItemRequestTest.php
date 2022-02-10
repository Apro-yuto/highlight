<?php

namespace Tests\Feature\Requests\Item;

use App\Http\Requests\Item\UpdateItemRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Tests\ValidationTestCase;

class UpdateItemRequestTest extends ValidationTestCase
{
    protected function request(): FormRequest
    {
        return new UpdateItemRequest();
    }

    protected function baseInput(): array
    {
        return [
            'name'           => 'Hoge',
            'gender'         => 1,
            'img_url'        => 'http://placehold.it/300',
            'purchase_price' => 1000,
            'selling_price'  => 2000,
            'template'       => 'Hoge',
        ];
    }

    public function formData()
    {
        return [
            'All OK' => [
                true,
            ],

            'nameが存在しない' => [
                false, [], 'name',
            ],

            'nameが20文字以下' => [
                false, ['name' => Str::random(21)],
            ],

            'nameが正しい形式ではない' => [
                false, ['name' => 1],
            ],

            'genderが存在しない' => [
                false, [], 'gender',
            ],

            'genderが正しい形式ではない' => [
                false, ['gender' => '１'],
            ],

            'img_urlが正しい形式ではない' => [
                false, ['img_url' => 1],
            ],

            'purchase_priceが存在しない' => [
                false, [], 'purchase_price',
            ],

            'purchase_priceが正しい形式ではない' => [
                false, ['purchase_price' => '１０００'],
            ],

            'selling_priceが存在しない' => [
                false, [], 'selling_price',
            ],

            'selling_priceが正しい形式ではない' => [
                false, ['selling_price' => '２０００'],
            ],

            'templateが正しい形式ではない' => [
                false, ['template' => 1],
            ],
        ];
    }
}
