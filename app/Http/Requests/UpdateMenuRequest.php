<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
{
   
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $menuId = $this->route('menu'); // Get the menu ID from the route

        return [
            'name' => 'required|string|max:255',
            'depth' => 'nullable|integer|min:0',
            'parent_id' => 'nullable|exists:menus,id|different:' . $menuId, // Ensures parent_id exists and isn't the same as the current menu ID
        ];
    }
}
