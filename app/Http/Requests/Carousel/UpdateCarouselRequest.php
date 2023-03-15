<?php

namespace App\Http\Requests\Carousel;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarouselRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'post_id' => 'required|integer|exists:posts,id',
            'image' => 'image|mimes:png,jpg,webp,jpeg',
            'video' => 'file',
            'pub_num' => 'integer',
            'is_ad' => 'required|boolean',
            'see_more' => 'required|string',
            'slot_num' => 'integer',
            'ad_script' => 'string'
        ];
    }
}
