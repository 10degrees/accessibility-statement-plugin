<?php

abstract class AbstractField
{
    /**
     * Field label
     *
     * @var string
     */
    protected $label;

    /**
     * Field ID
     *
     * @var string
     */
    protected $id;

    /**
     * Page the field belongs to
     *
     * @var string
     */
    protected $page_id;

    /**
     * Other arguements to pass to add_settings_field
     *
     * @var array
     */
    protected $other_args;

    /**
     * Default value of the option
     *
     * @var any
     */
    protected $default_value;

    public function __construct($args)
    {
        [
            'id' => $id,
            'label' => $label,
            'description' => $description,
            'other' => $other,
            'default_value' => $default_value,
        ] = $args;

        $this->id = $id;
        $this->label = $label;
        $this->default_value = $default_value;
        $this->description = $description;

        $this->setOtherArgs($other);
    }

    public function addClass($class)
    {
        $this->other_args['class'] .= $class . ' ';
    }

    public function setId($new_id)
    {
        $this->id = $new_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setOtherArgs($other_args)
    {
        if ($other_args) {
            $this->other_args = $other_args;
        } else {
            $this->other_args = [];
        }
    }

    public function setPage($page_id)
    {
        $this->page_id = $page_id;
    }

    public function register()
    {
        add_settings_field(
            $this->id,
            $this->label,
            [$this, 'renderField'],
            $this->page_id,
            $this->page_id,
            $this->other_args,
        );

        register_setting($this->page_id, $this->id, [
            'sanitize_callback' => [$this, 'sanitize'],
            'default' => $this->default_value,
        ]);
    }

    public function sanitize($input)
    {
        return $input;
    }

    public function renderField()
    {
        $this->render();

        $this->renderDescription();
    }

    public function render()
    {
        return '';
    }

    public function renderDescription()
    {
        if ($this->description) { ?>
            <p class='description'><?php echo $this->description; ?></p>
        <?php }
    }
}
