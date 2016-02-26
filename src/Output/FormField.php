<?php # -*- coding: utf-8 -*-

namespace Inpsyde\Nonces\Output;

use Inpsyde\Nonces\Context;

/**
 * FormField creator.
 *
 * @package Inpsyde\Nonces
 */

class FormField {

  /**
   * Returns a hidden field with the nonce parameter added.
   *
   * @param Context $context
   *
   * @return string
   */

   public function get ( Context $context ) {

     return wp_nonce_field( $context->get_action(), $context->get_name(), false, false );
   }

   /**
    * Prints a hidden field with the nonce parameter added.
    *
    * @param Context $context
    *
    * @return string
    */

   public function render ( Context $context ) {

     echo $this->get( $context );
   }

}
