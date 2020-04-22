<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Carbon;

/**
 * Class Translation
 *
 * @package App
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $slug
 * @property int $term_id
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
 * @method static Builder|Term whereDomainId($value)
 * @method static Builder|Term whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Term $term
 */
class Translation extends BaseModel
{
    public function term()
    {
        return $this->belongsTo(Term::class);
    }
}
