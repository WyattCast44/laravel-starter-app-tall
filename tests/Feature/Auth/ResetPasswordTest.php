<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ForgotPasswordTest extends TestCase
{
    use RefreshDatabase;

    public function test_cannot_directly_visit_reset_password_page()
    {
        $this->get(route('password.reset'))->assertOk();
    }

    public function test_livewire_component_is_present()
    {
        $this->get(route('password.email'))->assertSeeLivewire('auth.forgot-password');
    }

    public function test_is_redirected_if_logged_in()
    {
        $this->signIn();

        $this->get(route('password.email'))->assertRedirect(route('dashboard'));
    }

    public function test_email_is_required()
    {
        Livewire::test(ForgotPassword::class)
            ->set('email', '')
            ->call('attempt')
            ->assertHasErrors(['email' => [
                'required'
            ]]);
    }

    public function test_email_must_exist()
    {
        Livewire::test(ForgotPassword::class)
            ->set('email', 'not-a-registered-email@email.com')
            ->call('attempt')
            ->assertHasErrors();
    }

    public function test_a_valid_email_will_succeed()
    {
        $user = User::factory()->create();

        Livewire::test(ForgotPassword::class)
            ->set('email', $user->email)
            ->call('attempt')
            ->assertHasNoErrors()
            ->assertSet('emailSent', true);
    }
}
