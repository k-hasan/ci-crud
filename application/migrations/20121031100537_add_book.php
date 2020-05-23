<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_add_book extends CI_Migration
{

	public function up()
	{
		$this->dbforge->add_field(array(
		  'id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT',
		  'title varchar(50) NOT NULL',
		  'author varchar(50) NOT NULL',
		  'book_cover_path varchar(100) NOT NULL',
		  'date_created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
		  'date_updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
		));
		$this->dbforge->create_table('books');
	}

	public function down()
	{
		$this->dbforge->drop_table('books');
	}
}

