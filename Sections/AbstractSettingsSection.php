<?php

abstract class AbstractSettingsSection
{
    protected $id = '';
    protected $title = '';
    protected $fields = [];

    public function __construct()
    {
        add_action('admin_init', [$this, 'addSection']);

        add_action('admin_init', [$this, 'registerFields']);
    }

    /**
     * Register the fields for the section
     *
     * @return  void
     */
    public function registerFields()
    {
        foreach ($this->fields as $field) {
            $field->setPage($this->id);
            $field->register();
        }
    }

    /**
     * Register the section
     *
     * @return  void
     */
    public function addSection()
    {
        add_settings_section(
            $this->id,
            $this->title,
            [$this, 'render'],
            $this->id,
        );
    }

    /**
     * Render the section
     *
     * @return  void
     */
    public function render()
    {
        return '';
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }
}
