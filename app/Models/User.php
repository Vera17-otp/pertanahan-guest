<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    /**
     * Get the user's profile image (first media with ref_table = 'users')
     */
    public function profileImage()
    {
        return $this->hasOne(Media::class, 'ref_id', 'id')
                    ->where('ref_table', 'users')
                    ->where('mime_type', 'like', 'image/%')
                    ->orderBy('sort_order', 'asc');
    }

    /**
     * Get the URL for the profile image
     */
    public function getProfileImageUrlAttribute()
    {
        if ($this->profileImage && \Storage::disk('public')->exists($this->profileImage->file_name)) {
            return asset('storage/' . $this->profileImage->file_name);
        }
        
        // Default placeholder jika tidak ada gambar
        return asset('assets/img/user-placeholder.png');
    }

    /**
     * Get all user media
     */
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'id')
                    ->where('ref_table', 'users');
    }
}