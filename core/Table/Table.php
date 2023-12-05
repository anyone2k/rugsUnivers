<?php

namespace Core\Table;

use \Core\Database\Database;

class Table
{
    protected $table;
    protected $db;
    public function __construct(Database $db)
    {
        $this->db = $db;
        $parts = explode('\\', get_class($this));
        $class_name = end($parts);
        $this->table = strtolower(str_replace('Table', '', $class_name));

    }

    public function all()
    {
        return $this->db->query('SELECT * FROM PRODUCTS');
    }

    public function query($statement, $attributes = null, $one = false)
    {
        if ($attributes) {
            return $this->db->prepare(
                $statement,
                $attributes,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        } else {
            return $this->db->query(
                $statement,
                str_replace('Table', 'Entity', get_class($this)),
                $one
            );
        }
    }

}