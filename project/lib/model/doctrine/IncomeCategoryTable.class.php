<?php

/**
 * IncomeCategoryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class IncomeCategoryTable extends CategoryTable
{
  /**
   * Returns an instance of this class.
   *
   * @return object IncomeCategoryTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('IncomeCategory');
  }

  public function typecast(&$category) {
    $category['id'] = (int) $category['id'];
    if (!is_null($category['parent_id']))
      $category['parent_id'] = (int) $category['parent_id'];
    unset($category['type']);
    unset($category['created_by']);
    unset($category['updated_by']);
  }
}