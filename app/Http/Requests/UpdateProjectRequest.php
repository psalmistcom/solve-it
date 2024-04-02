<?php

namespace App\Http\Requests;

use App\Enum\Status;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ['required', 'max:255'],
            'image' => ['nullable', 'image'],
            "description" => ['nullable', 'string'],
            "due_date" => ['nullable', 'date'],
            "status" => 'required|in:'
                . Status::COMPLETED->value . ','
                . Status::IN_PROGRESS->value . ','
                . Status::PENDING->value,
        ];
    }
}
