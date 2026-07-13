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
            'id'             => $this->id,
            'employee_id_no' => $this->employee_id_no,
            'username'       => $this->username,

            // Use optional() so your code won't crash if a user somehow doesn't have a credential record
            'last_name'      => optional($this->userCredential)->last_name,
            'first_name'     => optional($this->userCredential)->first_name,
            'middle_name'    => optional($this->userCredential)->middle_name,
            'c_number'       => optional($this->userCredential)->c_number,

            'email'          => $this->email,
            'status'         => $this->status,
            'role'           => $this->role,
            // 'is_online'      => $this->status === 'online',
        ];
    }
}
