<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Theme;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ThemeController
 */
final class ThemeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $themes = Theme::factory()->count(3)->create();

        $response = $this->get(route('themes.index'));

        $response->assertOk();
        $response->assertViewIs('theme.index');
        $response->assertViewHas('themes');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $theme = Theme::factory()->create();

        $response = $this->get(route('themes.edit', $theme));

        $response->assertOk();
        $response->assertViewIs('theme.edit');
        $response->assertViewHas('theme');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ThemeController::class,
            'update',
            \App\Http\Requests\ThemeUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $theme = Theme::factory()->create();
        $name = $this->faker->name();
        $color = $this->faker->word();
        $text_color = $this->faker->word();
        $button_rounded = $this->faker->word();
        $button_bg = $this->faker->word();
        $user = User::factory()->create();

        $response = $this->put(route('themes.update', $theme), [
            'name' => $name,
            'color' => $color,
            'text_color' => $text_color,
            'button_rounded' => $button_rounded,
            'button_bg' => $button_bg,
            'user_id' => $user->id,
        ]);

        $theme->refresh();

        $response->assertRedirect(route('themes.index'));
        $response->assertSessionHas('theme.id', $theme->id);

        $this->assertEquals($name, $theme->name);
        $this->assertEquals($color, $theme->color);
        $this->assertEquals($text_color, $theme->text_color);
        $this->assertEquals($button_rounded, $theme->button_rounded);
        $this->assertEquals($button_bg, $theme->button_bg);
        $this->assertEquals($user->id, $theme->user_id);
    }
}
