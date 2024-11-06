<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Products;
use App\Models\Orders;
use App\Models\OrderItems;
use App\Models\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;

class OrderTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $user;
    protected $product;

    protected function setUp(): void
    {
        parent::setUp();

        // Create test user
        $this->user = User::factory()->create();
        // Create Category
        $this->category = Category::factory()->create();
        // Create test product
        $this->product = Products::factory()->create([
            'price' => 100000,
        ]);
    }

    /** @test */
    public function UserBisaMelakukanOrder()
    {
        Storage::fake('public');

        $this->actingAs($this->user);

        $data = [
            'payment_method' => 'bank_transfer',
            'requested_delivery_date' => now()->addDays(2)->format('Y-m-d'),
            'payment_proof' => UploadedFile::fake()->image('payment.jpg'),
            'cart_items' => [
                [
                    'product_id' => $this->product->id,
                    'quantity' => 2,
                    'price' => $this->product->price
                ]
            ]
        ];

        if ($data['payment_method'] == '') {
            $this->fail("Testing gagal karena data tidak lengkap: Payment Method Harus di isi.");
            return;
        }
        if ($data['requested_delivery_date'] == '') {
            $this->fail("Testing gagal karena data tidak lengkap: Requested Delivery Date Harus di isi.");
            return;
        }
        if ($data['payment_proof'] == '') {
            $this->fail("Testing gagal karena data tidak lengkap: Payment Proof Harus di isi.");
            return;
        }
        if (empty($data['cart_items'])) {
            $this->fail("Testing gagal karena data tidak lengkap: Cart Items Harus di isi.");
            return;
        }

        $response = $this->postJson(route('orders.store'), $data);

        if ($response->getStatusCode() === 401) {
            $this->fail("Testing gagal karena User Harus Login");
            return;
        }

        $response->assertStatus(201)
            ->assertJsonStructure([
                'message',
                'order_id'
            ]);

        $this->assertDatabaseHas('orders', [
            'user_id' => $this->user->id,
            'payment_method' => 'bank_transfer',
            'status' => 'new',
            'total_price' => $this->product->price * 2
        ]);

        $this->assertDatabaseHas('order_items', [
            'product_id' => $this->product->id,
            'quantity' => 2,
            'price' => $this->product->price,
            'subtotal' => $this->product->price * 2
        ]);

        // Storage::disk('public')->assertExists('payment_proofs/' . basename($response['payment_proof']));
    }




}