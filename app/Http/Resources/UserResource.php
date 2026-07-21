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
        $firstName  = $this->userCredential?->first_name;
        $lastName   = $this->userCredential?->last_name;
        $middleName = $this->userCredential?->middle_name;

        return [
            'id'             => $this->id,
            'employee_id_no' => $this->employee_id_no,
            'username'       => $this->username,

            // Individual fields
            'first_name'     => $firstName,
            'last_name'      => $lastName,
            'middle_name'    => $middleName,
            'c_number'       => $this->userCredential?->c_number,

            // Optional: Pre-formatted full name
            'full_name'      => trim("{$firstName} {$middleName} {$lastName}"),

            'email'          => $this->email,
            'status'         => $this->status,
            'role'           => $this->role,
        ];
    }
}
