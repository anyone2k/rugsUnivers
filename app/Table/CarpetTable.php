<?php

namespace App\Table;

use Core\Table\Table;

class CarpetTable extends Table
{

    public function last()
    {
        return $this->query("Select products.id, products.name, products.price,products.quantity
        from products ");
    }
}
