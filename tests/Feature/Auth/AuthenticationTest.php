<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase; // Ensures the database is reset for each test

    public function testLoginScreenCanBeRendered()
    {
        $response = $this->get('/login');

        $this->assertEquals(200, $response->status());
    }

    public function testUsersCanAuthenticateUsingTheLoginScreen()
{
    // Membuat pengguna dengan data yang benar
    $user = User::factory()->create([
        'name' => 'Test User',
        'email' => 'kizaru@test.com',
        'password' => bcrypt('password'), // Pastikan password sudah di-hash
    ]);

    // Data login
    $loginData = [
        'email' => 'kizaru@test.com',
        'password' => 'password',
    ];

    // Cek jika username atau password kosong
    if (empty($loginData['email']) || empty($loginData['password'])) {
        $this->fail("Testing gagal: Username atau password tidak boleh kosong.");
        return;
    }

    $response = $this->post('/login', $loginData);

    if(url('/') === $response->headers->get('Location')){
        $this->assertAuthenticatedAs($user);
        return;
    }else{
        $this->fail("Testing gagal: Username atau password salah.");
        $this->assertGuest();
    }


    // Simulasi brute force attack dengan mencoba login lebih dari batas yang ditentukan
    for ($i = 0; $i < 5; $i++) {
        $response = $this->post('/login', [
            'email' => 'kizaru@test.com',
            'password' => 'wrong-password', // Password salah
        ]);
    }

    // Cek jika terlalu banyak percobaan login
    if ($response->status() === 429) {
        $this->fail("Testing gagal: Terlalu banyak percobaan login.");
        return;
    }
}


    public function testUsersCannotAuthenticateWithInvalidPassword()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'), // Ensure password is hashed
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest(); // Asserts the user is a guest (not authenticated)
    }

    public function testUsersCanLogout()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'), // Ensure password is hashed
        ]);

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest(); // Asserts the user is now a guest
        $this->assertEquals(302, $response->status()); // Memastikan itu adalah pengalihan
        $this->assertEquals(url('/'), $response->headers->get('Location')); // Memastikan lokasi pengalihan
    
    }
}
