<?php
/**
 * Migration Task class.
 */
class HellofreshUsersTable
{
  public function preUp()
  {
      // add the pre-migration code here
  }

  public function postUp()
  {
      // add the post-migration code here
  }

  public function preDown()
  {
      // add the pre-migration code here
  }

  public function postDown()
  {
      // add the post-migration code here
  }

  /**
   * Return the SQL statements for the Up migration
   *
   * @return string The SQL string to execute for the Up migration.
   */
  public function getUpSQL()
  {
      $sql = "
        CREATE TABLE user (
          id INT (11) NOT NULL AUTO_INCREMENT,
          email VARCHAR (256) NOT NULL,
          name VARCHAR (256) NOT NULL,
          password VARCHAR (512),
          PRIMARY KEY (id)
          )
          ENGINE = InnoDB
          DEFAULT CHARACTER SET = utf8;

      ";

      return $sql;

  }

  /**
   * Return the SQL statements for the Down migration
   *
   * @return string The SQL string to execute for the Down migration.
   */
  public function getDownSQL()
  {
     return "DROP TABLE user";
  }

}