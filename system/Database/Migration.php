<?php namespace CodeIgniter\Database;

abstract class Migration
{
	/**
	 * The name of the database group to use.
	 * @var string
	 */
	protected $DBGroup = 'default';

	/**
	 * Database Connection instance
	 * @var BaseConnection 
	 */
	protected $db;

	/**
	 * Database Forge instance.
	 * @var Forge
	 */
	protected $forge;
	
	//--------------------------------------------------------------------
	
	public function __construct(Forge $forge = null) 
	{
	    $this->forge = ! is_null($forge)
		    ? $forge 
		    : \Config\Database::forge($this->DBGroup);

		$this->db = $this->forge->getConnection();
	}
	
	//--------------------------------------------------------------------

	/**
	 * Returns the database group name this migration uses.
	 *
	 * @return string
	 */
	public function getDBGroup()
	{
	    return $this->DBGroup;
	}

	//--------------------------------------------------------------------


	abstract public function up();

	//--------------------------------------------------------------------

	abstract public function down();

	//--------------------------------------------------------------------

}