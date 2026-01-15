<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $category;

    protected function setUp(): void
    {
        parent::setUp();
        // Create a user for authentication
        $this->user = User::factory()->create();
        // Create a category for products
        $this->category = Category::create([
            'name' => 'Electronics',
            'description' => 'Electronic devices'
        ]);
    }

    /** @test */
    public function creates_a_product_with_stock()
    {
        $this->actingAs($this->user);

        $response = $this->post(route('products.store'), [
            'name' => 'Laptop',
            'price' => 1500.00,
            'stock' => 50,
            'status' => true,
            'category_id' => $this->category->id
        ]);

        $response->assertRedirect(route('products.index'));
        
        $this->assertDatabaseHas('products', [
            'name' => 'Laptop',
            'stock' => 50
        ]);
    }

    /** @test */
    public function displays_inventory_stock()
    {
        $this->actingAs($this->user);

        Product::create([
            'name' => 'Mouse',
            'price' => 20.00,
            'stock' => 100,
            'status' => true,
            'category_id' => $this->category->id
        ]);

        $response = $this->get(route('products.index'));

        $response->assertStatus(200);
        $response->assertSee('Mouse');
        $response->assertSee('100'); // Should see the stock count
    }

    /** @test */
    public function updates_product_stock()
    {
        $this->actingAs($this->user);

        $product = Product::create([
            'name' => 'Keyboard',
            'price' => 50.00,
            'stock' => 10,
            'status' => true,
            'category_id' => $this->category->id
        ]);

        $response = $this->put(route('products.update', $product), [
            'name' => 'Keyboard Mechanical',
            'price' => 80.00,
            'stock' => 5, // Reduced stock
            'status' => true,
            'category_id' => $this->category->id
        ]);

        $response->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Keyboard Mechanical',
            'stock' => 5
        ]);
    }

    /** @test */
    public function deletes_product()
    {
        $this->actingAs($this->user);

        $product = Product::create([
            'name' => 'Old Monitor',
            'price' => 100.00,
            'stock' => 2,
            'status' => true,
            'category_id' => $this->category->id
        ]);

        $response = $this->delete(route('products.destroy', $product));

        $response->assertRedirect(route('products.index'));

        $this->assertDatabaseMissing('products', [
            'id' => $product->id
        ]);
    }
}
