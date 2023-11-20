<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    /**
     * Get the category that owns the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The related products that belong to the product.
     *
     * @return object
     */
    public function related_products()
    {
        return $this->category->products();
    }

    /**
     * Get an attribute from the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        if (in_array($key, ['name', 'description', 'short_description', 'how_to_use', 'active_ingredients', 'benefits', 'note'])) {
            $locale = app()->getLocale();
            $this->attributes[$key] = $this->{$key . '_' . $locale};
            return $this->getAttributeValue($key);
        }

        return parent::getAttribute($key);
    }
}
