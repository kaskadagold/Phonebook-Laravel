<?php

namespace Database\Seeders;

use App\Contracts\Repositories\RolesRepositoryContract;
use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function __construct(private readonly RolesRepositoryContract $rolesRepository)
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminId = $this->getAdminId();
        Contact::factory()->count(5)->create(['user_id' => $adminId]);
    }

    private function getAdminId(): int
    {
        return $this->rolesRepository->getAdminId();
    }
}
