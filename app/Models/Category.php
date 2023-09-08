<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{

    /**
     * Get The products that belong to the category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get an attribute from the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        if (in_array($key, ['name', 'description'])) {
            $locale = app()->getLocale();
            $this->attributes[$key] = $this->{$key . '_' . $locale};
            return $this->getAttributeValue($key);
        }

        return parent::getAttribute($key);
    }
}
