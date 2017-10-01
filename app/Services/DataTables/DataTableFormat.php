<?php

namespace App\Services\DataTables;

use Agent;

trait DataTableFormat
{
    protected $placement = 'right';
    protected $textLength = 15;
    protected $type = 'break';
    protected $typeAllowed = ['break', 'reduce'];

    /*
    |--------------------------------------------------------------------------
    | Constructor
    |--------------------------------------------------------------------------
    */
   
    /**
     * Format constructor
     *
     * @param string $text
     * @param object $data
     * @return string
     */
   public function formatString($text, $data = null)
   {
        //Filter for testing!!!!
        if(config('app.env') === 'testing') {
            return $text;
        }
        //Verify methods
        if(in_array($this->type, $this->typeAllowed)) {
            return $this->stringDeleted($text, $data);
        }
            return $text;
   }
   
    /*
    |--------------------------------------------------------------------------
    | Setter
    |--------------------------------------------------------------------------
    */

    /**
     * Set type
     *
     * @param string $type
     * @return string
     */
   public function type($type)
   {
        $this->type = $type;
            return $this;
   }

   /**
    * Set the max string length
    *
    * @param string $length
    * @return string
    */
   public function textLength($textLength)
   {
        $this->textLength = $textLength;
            return $this;
   }

   /**
    * Set the tooltip position
    *
    * @param string $length
    * @return string
    */
   public function placement($placement)
   {
        $this->placement = $placement;
            return $this;
   }

    /*
    |--------------------------------------------------------------------------
    | Methods
    |--------------------------------------------------------------------------
    */
    
    /**
     * Format type: break line
     *
     * @param string $text
     * @return string
     */
    private function breakString($text)
    {
        if (strlen($text) >= $this->textLength) {
            return implode(' <br>', explode( "\n", wordwrap($text, $this->textLength)));
        }
            return $text;
    }

    /**
     * Format type: limit string
     *
     * @param string $text
     * @return string
     */
    private function reduceString($text)
    {
        if(strlen($text) > $this->textLength) {
            $text_reduce = str_limit($text, $this->textLength);
                return sprintf('<span data-toggle="tooltip" data-placement="%s" title="%s" data-animation="false">%s<span>', $this->placement, $text, $text_reduce);
        }
        return $text;
    }

    /*
    |--------------------------------------------------------------------------
    | Constructor
    |--------------------------------------------------------------------------
    */
   
    /**
     * Constructor and string deleted
     *
     * @param string $text
     * @param objet $data
     * @return string
     */
    private function stringDeleted($text = null, $data = null)
    {
        if ($text) {
            $text = $this->{$this->type . "String"}($text);
        }

        if (isset($data) && $data->trashed()) {
            $text = sprintf('<del>%s</del>', $text);
        } 
            return $text ?? no_result();
    }
}