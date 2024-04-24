<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Tests the retrieval of the product index as an admin user.
     */
    public function test_product_index(): void
    {
        $specificNames = [
            'Humira (Adalimumab)', 'Keytruda (Pembrolizumab)', 'Revlimid (Lenalidomide)'
        ];
        foreach ($specificNames as $name) {
            Product::factory()->create(['name' => $name]);
        }

        $user = User::factory()->create();
        $role = Role::create(['name' => 'admin']);
        $user->roles()->attach($role->id);

        $response = $this->actingAs($user)->get(route('dashboard.products.index'));
        $response->assertStatus(200);
    }

    /**
     * Tests the creation of a product.
     */
    public function test_product_store(): void
    {
        $category = Category::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('dashboard.products.store'), [
            'name' => 'Humira (Adalimumab)',
            'sku' => 'TEST123',
            'category_id' => $category->id,
            'price' => 500.00,
            'units_sold' => 150,
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('products', ['name' => 'Humira (Adalimumab)']);
    }

    /**
     * Tests the update functionality for a product.
     */
    public function test_product_update(): void
    {
        $product = Product::factory()->create(['name' => 'Keytruda (Pembrolizumab)']);
        $user = User::factory()->create();

        $response = $this->actingAs($user)->put(route('dashboard.products.update', $product->id), [
            'name' => 'Updated Keytruda',
            'sku' => 'UPDATED123',
            'category_id' => $product->category_id,
            'price' => 999.99,
            'units_sold' => 250,
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('products', ['name' => 'Updated Keytruda']);
    }

    /**
     * Tests the deletion of a product.
     */
    public function test_product_destroy(): void
    {
        $product = Product::factory()->create(['name' => 'Revlimid (Lenalidomide)']);
        $user = User::factory()->create();

        $response = $this->actingAs($user)->delete(route('dashboard.products.destroy', $product->id));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}

