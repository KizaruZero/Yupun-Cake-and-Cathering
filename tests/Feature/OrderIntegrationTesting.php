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

class OrderIntegrationTesting extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $user;
    protected $product;
    protected $category;

    protected function setUp(): void
    {
        parent::setUp();

        // Create test user
        $this->user = User::factory()->create();
        // Create Category
        $this->category = Category::factory()->create();
        // Create test product
        $this->product = Products::factory()->create([
            'category_id' => $this->category->id,
            'price' => 100000,
        ]);
    }

    /** @test */
    public function CreateOrderWithProductModul()
    {
        $this->actingAs($this->user);

        // Simulate order input data
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

        // Send request to create order
        $response = $this->postJson(route('orders.store'), $data);
        if ($response->getStatusCode() === 401) {
            $this->fail("Testing gagal karena User Harus Login Untuk Melakukan Order");
            return;
        }
        // Check status
        $response->assertStatus(201);

        // Check order data in the database
        $this->assertDatabaseHas('orders', [
            'user_id' => $this->user->id,
            'total_price' => $this->product->price * 2,
        ]);

        // Check if the product exists in the database
        $this->assertDatabaseHas('products', [
            'id' => $this->product->id,
            'price' => $this->product->price
        ]);
    }

    /** @test */
    public function AuthWithOrderModul()
    {
        // Ensure no user is authenticated
        $this->assertGuest();

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

        // Send request to create order
        $response = $this->postJson(route('orders.store'), $data);

        if ($response->getStatusCode() === 401) {
            $this->fail("Testing gagal karena User Harus Login Untuk Melakukan Order");
            return;
        }

        // Check that the user is not allowed
        $response->assertStatus(401)
            ->assertJson(['message' => 'Unauthenticated.']);
    }
    /** @test */
    /** @test */
    // public function quantity_is_updated_when_product_already_in_cart()
    // {
    //     $this->actingAs($this->user); // Login dengan user

    //     // Tambahkan produk pertama kali
    //     session()->put('cart', [
    //         $this->product->id => [
    //             'product_id' => $this->product->id,
    //             'name' => $this->product->name,
    //             'quantity' => 1,
    //             'price' => $this->product->price,
    //             'image' => $this->product->image,
    //         ],
    //     ]);

    //     $data = [
    //         'quantity' => 2,
    //     ];

    //     // Tambahkan lagi produk yang sama
    //     $response = $this->postJson(route('cart.add', ['id' => $this->product->id]), $data);

    //     // Periksa response berhasil
    //     $response->assertStatus(302); // Redirect
    //     $response->assertSessionHas('success', 'Produk berhasil ditambahkan ke keranjang!');

    //     // Periksa data keranjang
    //     $cart = session('cart');
    //     $this->assertEquals(3, $cart[$this->product->id]['quantity']); // 1 + 2 = 3
    // }


}

