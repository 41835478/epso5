<?php 
/**
 * Available methods: 
    * link()
    * render_link()
 */

namespace App\Services\Html\Traits;

trait Form
{
    /**
     * @var private
     */
    protected $model;
    protected $item;
    protected $relationship;

    /**
     * Generate the checkbox
     * @return string
     */
    private function checkbox()
    {
        $checked = (isset($this->model) && in_array($this->item['id'], $this->model->{$this->relationship}->pluck('id')->all())) 
            ? $checked = ' checked="checked"' 
            : $checked = '';
        $input = '<input type="checkbox" id="checkbox-' . $this->relationship . '-' . $this->item['id'] . '" name="region_id[]" value="%s" class="checkBoxCustom"%s>%s';
        $constructor = '<div class="col-lg-2"><div class="checkbox"><label class="control-label">%s</label></div></div>';
        return sprintf($constructor, sprintf($input, $this->item['id'], $checked, $this->item['name']));
    }

    /**
     * Generate the model
     * @param objet $data
     * @return string
     */
    public function model($data)
    {
        $this->model = $data;
        return $this;
    }

    /**
     * Generate the model
     * @param int $itemId
     * @param string $itemId
     * @return string
     */
    public function item(int $itemId, string $itemName)
    {
        $this->item = [
            'id'    => $itemId,
            'name'  => $itemName
        ];
        return $this;
    }

    /**
     * Generate the relationship
     * @param string $relationship
     * @return string
     */
    public function relationship(string $relationship)
    {
        $this->relationship = $relationship;
        return $this;
    }
}
