<?php
/*
CREATE TABLE `directus_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `restrict_to_ip_whitelist` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/
use Ruckusing\Migration\Base as Ruckusing_Migration_Base;

class CreateDirectusGroupsTable extends Ruckusing_Migration_Base
{
    public function up()
    {
      $t = $this->create_table("directus_groups", array(
        "id"=>false,
        "options"=>"Engine=InnoDB DEFAULT CHARSET=utf8"
        )
      );

      // columns
      $t->column("id", "integer", array(
          "limit"=>11,
          "unsigned"=>true,
          "null"=>false,
          "auto_increment"=>true,
          "primary_key"=>true
        )
      );
      $t->column("name", "string", array(
        "limit" => 100,
        "default"=>NULL
        )
      );
      $t->column("description", "string", array(
        "limit" => 500,
        "default"=>NULL
        )
      );
      $t->column("restrict_to_ip_whitelist", "tinyinteger", array(
        "limit" => 1,
        "null" => false,
        "default" => 0
        )
      );
      $t->finish();

      $this->execute("INSERT INTO `directus_groups` (`id`, `name`, `description`, `restrict_to_ip_whitelist`) VALUES (1,'Administrator',NULL,0);");
    }//up()

    public function down()
    {
      $this->drop_table("directus_groups");
    }//down()
}
