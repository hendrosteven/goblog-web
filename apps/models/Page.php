<?php

/**
 * Description of Page
 *
 * @author Hendro Steven
 */
class Page extends DB\SQL\Mapper {

    function __construct(\DB\SQL $db) {
        parent::__construct($db, "tpage");
    }

    
}
