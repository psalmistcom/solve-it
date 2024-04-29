<?php

namespace App\Http\Requests;

use App\Enum\Priority;
use App\Enum\Status;
use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'project_id' => ['required', 'exists:projects,id'],
            'assigned_user_id' => ['required', 'exists:users,id'],
            "status" => 'required|in:'
                . Status::COMPLETED->value . ','
                . Status::IN_PROGRESS->value . ','
                . Status::PENDING->value,
            "priority" => 'required|in:'
                . Priority::HIGH->value . ','
                . Priority::MEDIUM->value . ','
                . Priority::LOW->value,
        ];
    }
}
