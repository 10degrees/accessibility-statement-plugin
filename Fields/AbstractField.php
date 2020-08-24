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

    protected $other_args;

    public function __construct($args)
    {
        [
            'id' => $id,
            'label' => $label,
            'other' => $other,
        ] = $args;

        $this->id = $id;
        $this->label = $label;

        $this->setOtherArgs($other);

        add_filter('admin_init', [$this, 'register']);
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
            [$this, 'render'],
            $this->page_id,
            $this->page_id,
            $this->other_args,
        );

        register_setting($this->page_id, $this->id, [
            'sanitize_callback' => [$this, 'sanitize'],
        ]);
    }

    public function sanitize($input)
    {
        return $input;
    }
}
