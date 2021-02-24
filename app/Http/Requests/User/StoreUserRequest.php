<?php

namespace App\Http\Requests\User;

use App\Repositories\UserRepositoryEloquent;
use App\Rules\UniqueRepo;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    protected $userRepo;

    public function __construct(UserRepositoryEloquent $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:255',
            'email' => ['required', 'email', new UniqueRepo($this->userRepo, 'email')],
            'password' => 'required|min:8|max:64|confirmed',
            'role' => 'required|alpha_num',
        ];
    }
}
