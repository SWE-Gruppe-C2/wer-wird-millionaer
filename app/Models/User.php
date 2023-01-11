<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function games()
    {
        return $this->hasMany(Game::class);
    }

    /**
     * Gibt das aktuell gespielte Spiel zurück und fängt ein neues an, wenn kein
     * aktuelles existiert.
     *
     * @return Game
     */
    public function current()
    {
        $first = GameStage::first();
        return $this->games()
            ->firstOrCreate(
                ['active' => true],
                [
                    'active' => true,
                    'start' => now(),
                    'joker5050' => true,
                    'jokerAudience' => true,
                    'jokerFriend' => true,
                    'user_id' => $this->id,
                    'question_id' => Question::random($first)->id,
                    'gamestage_id' => $first->id
                ]
            );
    }

    /**
     * Gibt das aktuell gespielte Spiel zurück oder das letzte beendete falls
     * kein aktuelles läuft.
     *
     * @return Game
     */
    public function last()
    {
        return $this->games()
            ->latest('end')
            ->first();
    }

    /**
     * Checks if the user is an admin.
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->is_admin;
    }
}
