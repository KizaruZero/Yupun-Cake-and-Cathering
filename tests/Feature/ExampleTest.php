<?php 
use App\Filament\Resources\ProductsResource;
use App\Models\Products;
use App\Models\Category;
use Filament\Actions\DeleteAction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Livewire\livewire;

uses(RefreshDatabase::class);

beforeEach(function () {
    // Create a test admin user and login if needed
    // $this->actingAs(User::factory()->create());
});

it('can delete product', function () {
    // Create a category first
    $category = Category::factory()->create();
    
    // Create a product with the existing category
    $product = Products::factory()->create([
        'category_id' => $category->id,
    ]);
 
    livewire(ProductsResource\Pages\EditProducts::class, [
        'record' => $product->getRouteKey(),
    ])
        ->callAction(DeleteAction::class);
 
    $this->assertModelMissing($product);
});

// Additional helpful tests
it('can list products', function () {
    $category = Category::factory()->create();
    $products = Products::factory(3)->create([
        'category_id' => $category->id,
    ]);

    livewire(ProductsResource\Pages\ListProducts::class)
        ->assertCanSeeTableRecords($products);
});

it('can create product', function () {
    $category = Category::factory()->create();
    
    $newProductData = [
        'name' => 'Test Product',
        'description' => 'Test Description',
        'category_id' => $category->id,
        'price' => 99.99,
        'stock' => 10,
        'image' => UploadedFile::fake()->image('test.jpg'),
    ];

    livewire(ProductsResource\Pages\CreateProducts::class)
        ->fillForm($newProductData)
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas('products', [
        'name' => 'Test Product',
        'category_id' => $category->id,
    ]);
}); ?>