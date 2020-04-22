<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Carbon;

/**
 * Class Term
 *
 * @package App
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $slug
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Term newModelQuery()
 * @method static Builder|Term newQuery()
 * @method static Builder|Term query()
 * @method static Builder|Term whereCreatedAt($value)
 * @method static Builder|Term whereId($value)
 * @method static Builder|Term whereName($value)
 * @method static Builder|Term whereSlug($value)
 * @method static Builder|Term whereDescription($value)
 * @method static Builder|Term whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Collection|Translation[] $translations
 */
class Term extends BaseModel
{
    public function translations()
    {
        return $this->hasMany(Translation::class);
    }
}
