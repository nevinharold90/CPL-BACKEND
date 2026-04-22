<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'employee_id_no' => $this->employee_id_no,
            'username' => $this->username,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'email' => $this->email,
            'status' => $this->status,
            'c_number' => $this->c_number,
            'role' => $this->role,
            'is_online' => $this->isOnline(),
        ];
    }
}
