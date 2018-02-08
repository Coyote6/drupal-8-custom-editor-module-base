<?php

namespace Drupal\myeditor\Plugin\Editor;

use Drupal\editor\Plugin\EditorBase;
use Drupal\editor\Entity\Editor;

/**
 * Defines a text editor for Drupal.
 *
 * @Editor(
 *   id = "myeditor",
 *   label = @Translation("My Editor"),
 *   supports_content_filtering = FALSE,
 *   supports_inline_editing = FALSE,
 *   is_xss_safe = FALSE,
 *   supported_element_types = {
 *     "textarea"
 *   }
 * )
 */
class MyEditor extends EditorBase {

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

}