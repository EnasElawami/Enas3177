<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Engineer;

class EngineerSeeder extends Seeder
{
    public function run()
    {
        Engineer::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password'), // تشفير كلمة المرور
            'city' => 'New York',
            'field' => 'Interior Designer',
            'about' => 'Expert in modern and functional interior designs.',
            'personal_photo' => 'uploads/engineers/john.jpg',
            'uploaded_pictures' => json_encode([
                'uploads/engineers/work1.jpg',
                'uploads/engineers/work2.jpg',
                'uploads/engineers/work3.jpg'
            ])
        ]);

        Engineer::create([
            'name' => 'Sarah Johnson',
            'email' => 'sarah@example.com',
            'password' => bcrypt('password'),
            'city' => 'Los Angeles',
            'field' => 'Architect',
            'about' => 'Specialized in innovative architectural designs.',
            'personal_photo' => 'uploads/engineers/sarah.jpg',
            'uploaded_pictures' => json_encode([
                'uploads/engineers/work4.jpg',
                'uploads/engineers/work5.jpg',
                'uploads/engineers/work6.jpg'
            ])
        ]);

        // يمكنك إضافة المزيد من البيانات بهذه الطريقة...
    }
}