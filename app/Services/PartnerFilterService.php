<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;

class PartnerFilterService
{
    public function applyFilter(Builder $query, $selectedPartner){
        if ($selectedPartner !== 'all') {
            $query->where('PARTNER', $selectedPartner);
        }

        return $query;
    }
}
