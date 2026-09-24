<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFabricRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array { return [
        'fabric_code'=>['required','string','max:50',Rule::unique('fabrics','fabric_code')->ignore($this->route('fabric'))],
        'fabric_name'=>['required','string','max:150'], 'fabric_type'=>['required','string','max:100'],
        'composition'=>['nullable','string','max:255'], 'color'=>['nullable','string','max:100'],
        'gsm'=>['nullable','numeric','min:0'], 'width'=>['nullable','numeric','min:0'],
        'unit'=>['nullable','string','max:30'], 'description'=>['nullable','string'],
        'status'=>['required',Rule::in(['Active','Inactive'])],
    ]; }
}
