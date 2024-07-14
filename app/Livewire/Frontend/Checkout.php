<?php

namespace App\Livewire\Frontend;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Checkout extends Component
{
    public $fname;
    public $lname;
    public $address;
    public $state_country;
    public $postal_zip;
    public $email_address;
    public $phone;
    public $order_notes;
    public $cart;

    protected $rules = [
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'state_country' => 'required|string|max:255',
        'postal_zip' => 'required|string|max:10',
        'email_address' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
    ];

    public function messages()
    {
        return [
            'fname.required' => 'Please enter your first name.',
            'lname.required' => 'Please enter your last name.',
            'address.required' => 'Please enter your address.',
            'state_country.required' => 'Please enter your state or country.',
            'postal_zip.required' => 'Please enter your postal or zip code.',
            'email_address.required' => 'Please enter your email address.',
            'email_address.email' => 'Please enter a valid email address.',
            'phone.required' => 'Please enter your phone number.',
        ];
    }


    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

    public function placeOrder()
    {
        $this->validate();

        $order = Order::create([
            'user_id' => Auth::id(),
            'first_name' => $this->fname,
            'last_name' => $this->lname,
            'address' => $this->address,
            'state_country' => $this->state_country,
            'postal_zip' => $this->postal_zip,
            'email' => $this->email_address,
            'phone' => $this->phone,
            'order_notes' => $this->order_notes,
        ]);


        foreach ($this->cart as $item) {
            $order->orderItems()->create([
                'product_id' => $item['productId'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ]);
        }
        session()->forget('cart');

        return redirect()->route('user.thankYou');
      
    }
    public function render()
    {
        return view('livewire.frontend.checkout');
    }
}
