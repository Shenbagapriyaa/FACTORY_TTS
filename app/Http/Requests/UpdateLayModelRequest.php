<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLayModelRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array { return [
        'lay_model_code'=>['required','string','max:50',Rule::unique('lay_models','lay_model_code')->ignore($this->route('layModel'))],
        'lay_model_name'=>['required','string','max:150'],
        'fabric_group_id'=>['required','integer','exists:fabric_groups,id'], 'fabric_id'=>['required','integer','exists:fabrics,id'],
        'lay_length'=>['required','numeric','min:0'], 'lay_width'=>['required','numeric','min:0'],
        'number_of_plies'=>['required','integer','min:1'], 'garment_size'=>['nullable','string','max:50'],
        'marker_length'=>['nullable','numeric','min:0'], 'marker_width'=>['nullable','numeric','min:0'],
        'description'=>['nullable','string'], 'status'=>['required',Rule::in(['Active','Inactive'])],
    ]; }
}
