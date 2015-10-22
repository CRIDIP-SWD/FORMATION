<?php

/*
CREATE TABLE `directus_bookmarks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `icon_class` varchar(255) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/

use Ruckusing\Migration\Base as Ruckusing_Migration_Base;

class CreateDirectusBookmarksTable extends Ruckusing_Migration_Base
{
    public function up()
    {
      $t = $this->create_table("directus_bookmarks", array(
        "options"=> "Engine=InnoDB DEFAULT CHARSET=utf8"
        )
      );

      //columns
      $t->column("user", "integer", array("limit"=>11, "default"=>NULL));
      $t->column("title", "string", array("limit"=>255, "default"=>NULL));
      $t->column("url", "string", array("limit"=>255, "default"=>NULL));
      $t->column("icon_class", "string", array("limit"=>255, "default"=>NULL));
      $t->column("active", "tinyinteger", array("limit"=>4, "default"=>NULL));
      $t->column("section", "string", array("limit"=>255, "default"=>NULL));

      $t->finish();
    }//up()

    public function down()
    {
      $this->drop_table("directus_bookmarks");
    }//down()
}
