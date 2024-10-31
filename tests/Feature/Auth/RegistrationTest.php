<?php
namespace Tests\Feature;


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class RegistrationTest extends TestCase
{
    use RefreshDatabase; // Menggunakan trait untuk reset database setelah setiap pengujian

    /** @test */
    public function registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200); // Memastikan status response adalah 200
    }

    /** @test */
    public function new_users_can_register()
    {
        $userData = [
            'name' => '',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        // Custom validation checks before proceeding
        if (empty($userData['name'])) {
            $this->fail("Testing gagal karena data tidak lengkap: nama harus diisi.");
            return;
        }
        if (empty($userData['email'])) {
            $this->fail("Testing gagal karena data tidak lengkap: email harus diisi.");
            return;
        }
        if (strlen($userData['password']) < 6) { // Asumsikan panjang minimal password adalah 6 karakter
            $this->fail("Testing gagal karena data tidak lengkap: password harus memiliki minimal 6 karakter.");
            return;
        }

        // Melanjutkan pendaftaran setelah pemeriksaan validasi
        $response = $this->post('/register', $userData);

        $this->assertAuthenticated(); // Memastikan pengguna saat ini terautentikasi
        $response->assertRedirect(route('/')); // Memastikan pengguna diarahkan ke route root setelah pendaftaran
    }

}
