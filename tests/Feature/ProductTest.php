<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Products;
use App\Models\OrderItems;
use App\Models\Category;
use App\Models\User;
use App\Models\Orders;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use App\Filament\Resources\ProductsResource\Pages\CreateProducts;
use App\Filament\Resources\ProductsResource\Pages\EditProducts;
use App\Filament\Resources\ProductsResource\Pages\ListProducts;
use Illuminate\Http\UploadedFile;
use Filament\Actions\DeleteAction;
use Illuminate\Support\Facades\Storage;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create and authenticate a user
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create storage disk for testing
        Storage::fake('public');
    }

    /** @test */
    public function BisaMembuatProduct()
    {
        $category = Category::factory()->create();
        $productData = Products::make([
            'name' => '',
            'description' => 'Test Description',
            'category_id' => $category->id,
            'price' => 99.99,
            'stock' => 'tersedia',
            'image' => UploadedFile::fake()->image('test.jpg'),

        ]);

        // Custom validation checks before proceeding
        if ($productData->price < 0) {
            $this->fail("Testing gagal karena data tidak lengkap: harga harus positif.");
            return;
        }
        if ($productData->stock < 0) {
            $this->fail("Testing gagal karena data tidak lengkap: stock harus positif.");
            return;
        }
        if (empty($productData->name)) {
            $this->fail("Testing gagal karena data tidak lengkap: nama harus diisi.");
            return;
        }

        // If no custom errors, proceed with Livewire test
        Livewire::test(CreateProducts::class)
            ->set('data.name', $productData->name)
            ->set('data.description', $productData->description)
            ->set('data.category_id', $productData->category_id)
            ->set('data.price', $productData->price)
            ->set('data.stock', $productData->stock)
            ->set('data.image', $productData->image)
            ->call('create')
            ->assertHasNoErrors();

        // Database assertion after successful creation
        $this->assertDatabaseHas('products', [
            'name' => $productData->name,
            'description' => $productData->description,
            'category_id' => $productData->category_id,
            'price' => $productData->price,
            'stock' => $productData->stock,
        ]);
    }


    /** @test */
    public function BisaUpdateProduct()
    {
        $category = Category::factory()->create();

        // Create a product to simulate an existing product
        $product = Products::factory()->create([
            'name' => 'Test Product 2',
            'description' => 'Test Description',
            'category_id' => $category->id,
            'price' => 99.99,
            'stock' => 'tersedia',
            'image' => UploadedFile::fake()->image('test.jpg'),
        ]);

        // Check if the product exists before proceeding
        $nonExistentProductId = 999; // tinmggal hapus non existent
        if (empty($product->id->nonExistentProductId)) {
            $this->fail("Testing gagal karena data tidak ada.");
            return;
        }

        $newData = [
            'name' => 'Updated Product Name',
            'price' => 99.99,
            'category_id' => $category->id,
        ];

        Livewire::test(EditProducts::class, ['record' => $product->id])
            ->set('data.name', $newData['name'])
            ->set('data.price', $newData['price'])
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('products', $newData);
    }

    /** @test */
    public function BisaDeleteProduct()
    {
        // Create a category first
        $category = Category::factory()->create();


        // Create a product with the category
        $product = Products::factory()->create([
            'category_id' => $category->id
        ]);

        // Test the delete action
        Livewire::test(EditProducts::class, ['record' => $product->id])
            ->callAction(DeleteAction::class)
            ->assertHasNoErrors();

        // Assert the product was deleted
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
        $this->assertModelMissing($product);
    }

    /** @test */
    public function BisaLihatProduct()
    {
        $category = Category::factory()->create();
        $products = Products::factory(3)->create([
            'category_id' => $category->id
        ]);

        Livewire::test(ListProducts::class)
            ->assertCanSeeTableRecords($products);
    }





}