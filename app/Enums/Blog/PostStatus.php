<?php declare(strict_types=1);

namespace App\Enums\Blog;

use BenSampo\Enum\Enum;

final class PostStatus extends Enum
{
    public const Draft = 'draft';
    public const Public = 'public';
}
