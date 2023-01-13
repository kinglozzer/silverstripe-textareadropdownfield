import Injector from 'lib/Injector';
import TextareaDropdownField from '../components/TextareaDropdownField';

export default () => {
  Injector.component.registerMany({
    TextareaDropdownField,
  });
};
