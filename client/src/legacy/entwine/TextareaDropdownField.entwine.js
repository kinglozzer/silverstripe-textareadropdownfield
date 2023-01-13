import jQuery from 'jquery';
import { loadComponent } from 'lib/Injector';
import React from 'react';
import ReactDOM from 'react-dom';

jQuery.entwine('ss', ($) => {
  $('.js-injector-boot .form__field-holder .textarea-dropdown-field').entwine({
    onmatch() {
      const Component = loadComponent('TextareaDropdownField');
      const schemaState = this.data('state');

      const setValue = (fieldName, value) => {
        const input = document.querySelector(`input[name="${fieldName}"], textarea[name="${fieldName}"]`);

        if (!input) {
          return;
        }

        input.value = value;
      };

      ReactDOM.render(<Component {...schemaState} onAutofill={setValue} />, this[0]);
    },

    onunmatch() {
      ReactDOM.unmountComponentAtNode(this[0]);
    },
  });
});
