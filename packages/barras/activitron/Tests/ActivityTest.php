<?php
namespace Barras\Activitron;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;


class ActivityTest extends TestCase
{

    protected $loadEnvironmentVariables = true;

    public $baseUrl = 'http://user-activity.test/';

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate', ['--database' => 'mysql'])->run();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_activity_is_stored_on_user_creation()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get('/app/user/create');
        $response->assertSee('Create User');

        $this->assertDatabaseHas('users', [
            'email' => $user->email,
            'name' => $user->name,
        ]);

        $this->assertDatabaseHas('actions', [
            'subject_id' => $user->id,
            'subject' => 'User',
            'action' => 'create',
        ]);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_activity_is_stored_on_user_update()
    {
        $user = User::FindOrFail(2);

        $response = $this->actingAs($user)
            ->get('/app/user/2');
        $response->assertSee('Edit User');

        $data['email'] = 'updated@intest.com';
        $data['name'] = 'Updated in test';
        $user->update($data);

        $this->assertDatabaseHas('users', [
            'email' => $user->email,
            'name' => $user->name,
        ]);

        $this->assertDatabaseHas('actions', [
            'subject_id' => $user->id,
            'subject' => 'User',
            'action' => 'update',
        ]);

        $response->assertStatus(200);
    }
}
