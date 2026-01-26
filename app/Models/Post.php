<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $with = ['author', 'category'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->whereHas(
                'category',
                fn($query) =>
                $query->where('slug', $category)
            );
        });

        $query->when($filters['author'] ?? false, function ($query, $author) {
            $query->whereHas(
                'author',
                fn($query) =>
                $query->where('username', $author)
            );
        });
    }

    public function scopeMonthlyStats(Builder $query, int $year, $author_id = null)
    {
        $query->select(
            DB::raw("EXTRACT(MONTH FROM created_at) as month"),
            DB::raw('COUNT(*) as total')
        )
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->orderBy('month');

        $query->when($author_id ?? false, function ($query, $author_id) {
            $query->where('author_id', $author_id);
        });
    }

    public static function getAvailableYears()
    {
        return self::selectRaw("DISTINCT EXTRACT(YEAR FROM created_at) as year")
            ->orderBy('year', 'desc')
            ->pluck('year');
    }

    public static function getPostsCount($period = null)
    {
        $query = self::selectRaw("COUNT(*)");

        $query->when($period ?? false, function ($query, $period) {
            $query->whereRaw("created_at >= date_trunc('$period', now())
                            AND created_at < date_trunc('$period', now() + INTERVAL '1 $period')");
        });

        return $query->pluck('count')[0];
    }

    public function scopeCategoryCount(Builder $query)
    {
        $query->select(['category_id', 'COUNT(*)'])->with('categories')->groupBy('category_id')->count();
    }
}
