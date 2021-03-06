<?php

/**
 * Income
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    finances
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Income extends BaseIncome
{
  /**
   * Income registered this year.
   *
   * @return Boolean
   */
  public function isThisYear()
  {
    return (substr($this->getCreatedAt(), 0, 4) == date('Y'));
  }

  /**
   * Income registered this month (and this year - at the same time).
   *
   * @return Boolean
   */
  public function isThisMonth()
  {
    return ((substr($this->getCreatedAt(), 5, 2) == date('m')) && $this->isThisYear());
  }
}
