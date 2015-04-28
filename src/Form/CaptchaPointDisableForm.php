<?php
/**
 * @file
 * Contains \Drupal\captcha\Form\CaptchaPointDisableForm.
 */

namespace Drupal\captcha\Form;

use Drupal\Core\Entity\EntityConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;

/**
 * Builds the form to delete a Captcha Point.
 */
class CaptchaPointDisableForm extends EntityConfirmFormBase {

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to disable the Captcha?');
  }

  /**
   * {@inheritdoc}
   */
  public function getDescription() {
    return $this->t('This will disable the captcha.');
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    return new Url('captcha_point.list');
  }

  /**
   * {@inheritdoc}
   */
  public function getConfirmText() {
    return $this->t('Disable');
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->entity->disable();
    $this->entity->save();
    drupal_set_message($this->t('Captcha point %label has been disabled.', array('%label' => $this->entity->getOriginalId())));
  }
}
