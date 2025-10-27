<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampleDataSeeder extends Seeder
{
    public function run()
    {
        DB::table('menu_items')->insert([
            ['name' => 'Phở bò', 'description' => 'Phở bò tái chín', 'price' => 45000, 'category' => 'Món chính', 'is_available' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bún chả', 'description' => 'Bún chả Hà Nội', 'price' => 40000, 'category' => 'Món chính', 'is_available' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Trà đá', 'description' => null, 'price' => 3000, 'category' => 'Đồ uống', 'is_available' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('employees')->insert([
            ['name' => 'Nguyễn Văn A', 'email' => 'manager@example.com', 'phone' => '0900000001', 'role' => 'manager', 'hired_at' => '2023-01-01', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Trần Thị B', 'email' => 'order1@example.com', 'phone' => '0900000002', 'role' => 'order', 'hired_at' => '2023-02-01', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Lê Văn C', 'email' => 'kitchen1@example.com', 'phone' => '0900000003', 'role' => 'kitchen', 'hired_at' => '2023-03-10', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('dining_tables')->insert([
            ['number' => 1, 'seats' => 2, 'location' => 'Tầng 1', 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
            ['number' => 2, 'seats' => 4, 'location' => 'Tầng 1', 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
            ['number' => 3, 'seats' => 6, 'location' => 'Tầng 2', 'status' => 'available', 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('reservations')->insert([
            ['customer_name' => 'Pham D', 'customer_phone' => '0911002200', 'reservation_time' => now()->addDay(), 'party_size' => 2, 'dining_table_id' => 1, 'status' => 'confirmed', 'notes' => null, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
