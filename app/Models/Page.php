<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Page extends Model
{

    /**
     * Get an attribute from the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        if (in_array($key, ['title', 'description', 'keywords', 'body'])) {
            $locale = app()->getLocale();
            $this->attributes[$key] = $this->{$key . '_' . $locale};
            return $this->getAttributeValue($key);
        }

        return parent::getAttribute($key);
    }
}
