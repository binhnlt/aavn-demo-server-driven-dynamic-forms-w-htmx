<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'iPhone 15 Pro', 'brand' => 'Apple', 'price' => 999.00, 'category' => 'Smartphones'],
            ['name' => 'iPhone 14', 'brand' => 'Apple', 'price' => 699.00, 'category' => 'Smartphones'],
            ['name' => 'MacBook Pro 14"', 'brand' => 'Apple', 'price' => 1999.00, 'category' => 'Laptops'],
            ['name' => 'MacBook Air M2', 'brand' => 'Apple', 'price' => 1299.00, 'category' => 'Laptops'],
            ['name' => 'AirPods Pro', 'brand' => 'Apple', 'price' => 249.00, 'category' => 'Accessories'],
            ['name' => 'Samsung Galaxy S24 Ultra', 'brand' => 'Samsung', 'price' => 1299.00, 'category' => 'Smartphones'],
            ['name' => 'Samsung Galaxy S24', 'brand' => 'Samsung', 'price' => 799.00, 'category' => 'Smartphones'],
            ['name' => 'Samsung Galaxy A55', 'brand' => 'Samsung', 'price' => 449.00, 'category' => 'Smartphones'],
            ['name' => 'Samsung Galaxy Tab S9', 'brand' => 'Samsung', 'price' => 799.00, 'category' => 'Tablets'],
            ['name' => 'Samsung QLED 55"', 'brand' => 'Samsung', 'price' => 899.00, 'category' => 'TVs'],
            ['name' => 'Dell XPS 15', 'brand' => 'Dell', 'price' => 1799.00, 'category' => 'Laptops'],
            ['name' => 'Dell Inspiron 15', 'brand' => 'Dell', 'price' => 649.00, 'category' => 'Laptops'],
            ['name' => 'Dell UltraSharp 27"', 'brand' => 'Dell', 'price' => 549.00, 'category' => 'Monitors'],
            ['name' => 'Sony WH-1000XM5', 'brand' => 'Sony', 'price' => 349.00, 'category' => 'Accessories'],
            ['name' => 'Sony PlayStation 5', 'brand' => 'Sony', 'price' => 499.00, 'category' => 'Gaming'],
            ['name' => 'Sony Bravia 65"', 'brand' => 'Sony', 'price' => 1499.00, 'category' => 'TVs'],
            ['name' => 'Xiaomi 14 Pro', 'brand' => 'Xiaomi', 'price' => 799.00, 'category' => 'Smartphones'],
            ['name' => 'Xiaomi Redmi Note 13', 'brand' => 'Xiaomi', 'price' => 249.00, 'category' => 'Smartphones'],
            ['name' => 'Xiaomi Smart TV 55"', 'brand' => 'Xiaomi', 'price' => 549.00, 'category' => 'TVs'],
            ['name' => 'ASUS ROG Zephyrus G14', 'brand' => 'ASUS', 'price' => 1599.00, 'category' => 'Laptops'],
            ['name' => 'ASUS ZenBook 14', 'brand' => 'ASUS', 'price' => 999.00, 'category' => 'Laptops'],
            ['name' => 'ASUS ROG Phone 8', 'brand' => 'ASUS', 'price' => 1099.00, 'category' => 'Smartphones'],
            ['name' => 'Logitech MX Master 3S', 'brand' => 'Logitech', 'price' => 99.00, 'category' => 'Accessories'],
            ['name' => 'Logitech MX Keys', 'brand' => 'Logitech', 'price' => 119.00, 'category' => 'Accessories'],
            ['name' => 'Logitech G Pro X Superlight', 'brand' => 'Logitech', 'price' => 159.00, 'category' => 'Gaming'],
            ['name' => 'Razer BlackWidow V4', 'brand' => 'Razer', 'price' => 169.00, 'category' => 'Gaming'],
            ['name' => 'Razer DeathAdder V3', 'brand' => 'Razer', 'price' => 89.00, 'category' => 'Gaming'],
            ['name' => 'Razer Blade 15', 'brand' => 'Razer', 'price' => 2499.00, 'category' => 'Laptops'],
            ['name' => 'LG OLED C3 65"', 'brand' => 'LG', 'price' => 1899.00, 'category' => 'TVs'],
            ['name' => 'LG UltraWide 34"', 'brand' => 'LG', 'price' => 699.00, 'category' => 'Monitors'],
            ['name' => 'LG Gram 14', 'brand' => 'LG', 'price' => 1199.00, 'category' => 'Laptops'],
            ['name' => 'HP Spectre x360', 'brand' => 'HP', 'price' => 1499.00, 'category' => 'Laptops'],
            ['name' => 'HP Envy 13', 'brand' => 'HP', 'price' => 999.00, 'category' => 'Laptops'],
            ['name' => 'Lenovo ThinkPad X1 Carbon', 'brand' => 'Lenovo', 'price' => 1799.00, 'category' => 'Laptops'],
            ['name' => 'Lenovo IdeaPad 5', 'brand' => 'Lenovo', 'price' => 699.00, 'category' => 'Laptops'],
            ['name' => 'iPad Pro 12.9"', 'brand' => 'Apple', 'price' => 1099.00, 'category' => 'Tablets'],
            ['name' => 'iPad Air', 'brand' => 'Apple', 'price' => 749.00, 'category' => 'Tablets'],
            ['name' => 'Bose QuietComfort 45', 'brand' => 'Bose', 'price' => 329.00, 'category' => 'Accessories'],
            ['name' => 'JBL Flip 6', 'brand' => 'JBL', 'price' => 129.00, 'category' => 'Accessories'],
            ['name' => 'JBL Charge 5', 'brand' => 'JBL', 'price' => 179.00, 'category' => 'Accessories'],
            ['name' => 'Nintendo Switch OLED', 'brand' => 'Nintendo', 'price' => 349.00, 'category' => 'Gaming'],
            ['name' => 'Xbox Series X', 'brand' => 'Microsoft', 'price' => 499.00, 'category' => 'Gaming'],
            ['name' => 'Samsung 980 Pro SSD 1TB', 'brand' => 'Samsung', 'price' => 119.00, 'category' => 'Components'],
            ['name' => 'WD Blue 2TB HDD', 'brand' => 'WD', 'price' => 59.00, 'category' => 'Components'],
            ['name' => 'Corsair Vengeance 32GB RAM', 'brand' => 'Corsair', 'price' => 89.00, 'category' => 'Components'],
            ['name' => 'NVIDIA RTX 4070', 'brand' => 'NVIDIA', 'price' => 599.00, 'category' => 'Components'],
            ['name' => 'AMD Ryzen 7 7800X3D', 'brand' => 'AMD', 'price' => 449.00, 'category' => 'Components'],
            ['name' => 'Anker 65W GaN Charger', 'brand' => 'Anker', 'price' => 35.00, 'category' => 'Accessories'],
            ['name' => 'Anker PowerCore 26800', 'brand' => 'Anker', 'price' => 59.00, 'category' => 'Accessories'],
            ['name' => 'TP-Link AX6000 Router', 'brand' => 'TP-Link', 'price' => 179.00, 'category' => 'Networking'],
        ];

        $this->db->table('products')->insertBatch($products);
    }
}
