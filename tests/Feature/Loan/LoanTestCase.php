<?php

namespace Tests\Feature\Loan;

use App\Modules\Auth\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\TModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\ClientRepository;
use Tests\TestCase;

class LoanTestCase extends TestCase
{
    protected $admin;
    protected $customer;

    private string $adminPassword = 'admin';
    private string $customerPassword = 'customer';

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
    }

    public function setUp(): void
    {
        parent::setUp();

        $this->artisan('passport:install');

        $this->admin = $this->createUser(User::TYPE_ADMIN);
        $this->customer = $this->createUser(User::TYPE_CUSTOMER);
    }

    /**
     * Create user
     *
     * @param int $type
     * @return Collection|TModel|Model
     */
    private function createUser($type = User::TYPE_CUSTOMER)
    {
        return User::factory()->create([
            'type' => $type,
            'password' => $type == User::TYPE_CUSTOMER ? $this->customerPassword : $this->adminPassword
        ]);
    }

    /**
     * Login
     *
     * @param false $admin
     * @return string
     */
    private function login($admin = false): string
    {
        $email = $admin ? $this->admin->email : $this->customer->email;
        $password = $admin ? $this->adminPassword : $this->customerPassword;

        $response = $this->post('/api/v1/auth/login', [
            'email' => $email,
            'password' => $password
        ]);

        return data_get($response->json()['data'], 'token');
    }

    /**
     * Acting as Admin
     *
     * @return LoanTestCase
     */
    protected function actingAsAdmin()
    {
        $token = $this->login(true);
        return $this->withHeaders([
            'Authorization' => 'Bearer ' . $token
        ]);
    }

    /**
     * Acting as Customer
     *
     * @return LoanTestCase
     */
    protected function actingAsCustomer()
    {
        $token = $this->login(false);
        return $this->withHeaders([
            'Authorization' => 'Bearer ' . $token
        ]);
    }

    private function createPersonalAccessClients()
    {
        $clientRepository = new ClientRepository();
        $client = $clientRepository->createPersonalAccessClient(
            null, 'Test Personal Access Client', 'http://localhost'
        );

        DB::table('oauth_personal_access_clients')->insert([
            'client_id' => $client->id,
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime,
        ]);
    }
}