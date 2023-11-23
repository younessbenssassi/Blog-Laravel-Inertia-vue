<?php

namespace App\Models\Blog;

use App\Enums\Blog\PostStatus;
use App\Events\Blog\PostCreated;
use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'status',
        'title',
        'content'
    ];

    /**
     * The relations that should be loaded by default (we always need it).
     *
     * @var string[]
     */
    protected $with = [
        'category',
        'creator',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * @var string[]
     */
    protected $dispatchesEvents = [
        'created' => PostCreated::class,
    ];

    /**
     * @var string[]
     */
    protected $appends = [
        'image'
    ];

    /**
     * Get the post's image.
     */
    protected function image(): Attribute
    {
        $image = $this->getMedia('images')->first();
        return Attribute::make(
            get: fn() => $image ? asset('storage/'.$image->id.'/'.$image->file_name) :
                'https://developers.elementor.com/docs/assets/img/elementor-placeholder-image.png',
        );
    }

    /**
     * This method return the category of this post
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id')
            ->withTrashed();
    }

    /**
     * This method return the creator of this post
     *
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @param $query
     * @param array $filters
     * @return void
     */
    public function scopeFilter($query, array $filters): void
    {
        if (isset($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (isset($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }

        if (isset($filters['search'])) {
            $query->where('title', 'LIKE', "%{$filters['search']}%")
                ->orWhere('content', 'LIKE', "%{$filters['search']}%");
        }
    }

    /**
     * @param $query
     * @return void
     */
    public function scopeHasAccess($query): void
    {
        if (Auth::check()) {
            $query->where('user_id', Auth::id());
        } else {
            $query->where('status', PostStatus::Public);
        }
    }
}
