The most basic example of an editor plugin module for Drupal 8. It does nothing, but shows a working example of the minimal files needed (to not throw errors).


A few important items to note:

1. Folder structure must contain the MYMODULE.info.yml and MYMODULE.module files and the editor plugin must be in the folder structure src/Plugin/Editor directory in your module for Drupal 8 to automatically discover the file. 
  
2. The editor plugin file name must match your class name inside of that file.
   
3. You must have the comments! The values set into the comments are used by Drupal:

```php
	/*
	 * @Editor(
	 *   id = "myeditor",
	 *   label = @Translation("My Editor"),
	 *   supports_content_filtering = FALSE,
	 *   supports_inline_editing = FALSE,
	 *   is_xss_safe = FALSE,
	 *   supported_element_types = {
	 *     "textarea"
	 *   }
	 */
```

  I do not agree with this implementation as comments should always just be comments, but it is what it is.

4. Using other names besides your module's machine name seems to throw an "You must configure the selected text editor." error on saving a text format with that editor or a PHP error if changed after an editor is saved to a Text Format. Example:

	namespace Drupal\foobar\Plugin\Editor;

  You can add capital letters to your namespace:

```php
	namespace Drupal\MyEditor\Plugin\Editor;
```

  But it is probably best to stay with convention and use your module's machine name:

```php
	namespace Drupal\myeditor\Plugin\Editor;
```

5. As @johndevman pointed out in a post, you must implement these two methods.
  
  @see https://www.drupal.org/forum/support/module-development-and-code-questions/2016-11-23/create-new-text-editor-d8

```php
	/**
	 * {@inheritdoc}
	 */
	public function getJSSettings (Editor $editor) {
		return [];
	}

	/**
	 * {@inheritdoc}
	 */
	public function getLibraries(Editor $editor) {
		return [];	
	}
```

6. Make sure to include both:
```php
	use Drupal\editor\Plugin\EditorBase;
	use Drupal\editor\Entity\Editor;
```

  If you are new to using namespaces you need to make sure to include both of these.  Due to the implementation in #3 you must include the Editor class.  It is easy to miss it, because it is used in the parameters of the class methods.  EditorBase is used by class itself with the extends statement.

7. You must include a javascript with an editor attached with properties that are functions for attach, detach, and onChange.
