<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFabricGroupRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array { return [
        'group_code'=>['required','string','max:50','unique:fabric_groups,group_code'],
        'group_name'=>['required','string','max:150'], 'description'=>['nullable','string'],
        'status'=>['required',Rule::in(['Active','Inactive'])],
        'fabric_ids'=>['required','array','min:1'], 'fabric_ids.*'=>['integer','distinct','exists:fabrics,id'],
    ]; }
}
