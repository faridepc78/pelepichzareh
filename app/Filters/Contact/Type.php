<?php


namespace App\Filters\Contact;


use App\Filters\Filter;
use App\Models\Contact;

class Type extends Filter
{
    protected function applyFilter($builder)
    {
        $keyword = request($this->filterName());

        if ($keyword == Contact::READ) {
            return $builder->where('type', '=', Contact::READ);
        } elseif ($keyword == Contact::UNREAD) {
            return $builder->where('type', '=', Contact::UNREAD);
        } else {
            return $builder;
        }
    }
}
