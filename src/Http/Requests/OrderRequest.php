<?php

namespace Alexei4er\EventTicketStore\Http\Requests;

use Alexei4er\EventTicketStore\Models\Order;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
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
        $rules = [
            'name' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|email',
            'amount' => 'required',
            'customer_type' => 'required|in:' . implode(',', array_keys(Order::CUSTOMER_TYPES)),
        ];

        if ($this->input('customer_type') != 'person') {
            $rules = $rules + [
                'inn' => 'required',
                'kpp' => 'required',
                'ogrn' => 'required',
                'rs' => 'required',
                'ks' => 'required',
                'bik' => 'required',
                'bank' => 'required',
                'address' => 'required',
                'general_manager' => 'required',
                'position' => 'required',
                'reason' => 'required',
            ];
        }

        return $rules;
    }
}
