<?php 

namespace App\Repositories\_Traits;

use Carbon\Carbon;

trait Date
{
    /**
     * Sanitize the date 'value'. Ready for DB!!!!
     *
     * @param  $date string
     * @return string
     */
    public function setDate($date)
    {
        if (strlen($date)) {
            $current = Carbon::createFromFormat($this->format(), $date);
            //
            return $current->gte($this->min()) 
                ? $current 
                : $minDate;
        }
        //
        return null;
    }

    /**
     * Get the date from the DB with its format
     *
     * @param  $date string
     * @return string
     */
    public function getDate($date)
    {
        return strlen($date) 
            ? Carbon::parse($date)->format($this->format()) 
            : null;
    }

    /**
     * Set the correct format for a date value (base on Localization)
     *
     * @return string
     */
    private function format()
    {
        return config('app.locale') != 'en' ? 'd/m/Y' : 'm/d/Y';
    }

    /**
     * Set the minimal date value to be stored
     *
     * @return string
     */
    private function min()
    {
        return Carbon::create(1, 1, 1, 0, 0, 0);
    }
}
