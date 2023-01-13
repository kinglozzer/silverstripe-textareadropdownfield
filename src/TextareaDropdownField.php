<?php
declare(strict_types=1);

namespace AdrHumphreys\TextareaDropdownField;

use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldGroup;
use SilverStripe\Forms\FormField;
use SilverStripe\Forms\TextareaField;

class TextareaDropdownField extends FieldGroup
{
    protected $schemaDataType = FormField::SCHEMA_DATA_TYPE_CUSTOM;

    protected $schemaComponent = 'TextareaDropdownField';

    private TextareaField $textField;

    private DropdownField $dropdownField;

    public function __construct(
        string $name,
        string $title,
        string $textRelation,
        string $dropdownRelation,
        array $dropdownSource
    ) {
        $this->textField = TextareaField::create($textRelation);
        $this->dropdownField = DropdownField::create($dropdownRelation)->setSource($dropdownSource);

        $fields = [
            $this->textField,
            $this->dropdownField,
        ];

        $this->setName($name)->setValue('');
        $this->addExtraClass('textarea-dropdown-field');

        parent::__construct($title, $fields);
    }

    public function getTextField(): TextareaField
    {
        return $this->textField;
    }

    public function getDropdownField(): DropdownField
    {
        return $this->dropdownField;
    }

    public function getSchemaStateDefaults()
    {
        $state = parent::getSchemaStateDefaults();
        $state['textField'] = $this->textField->getSchemaState();
        $state['dropdownField'] = $this->dropdownField->getSchemaState();

        return $state;
    }
}
