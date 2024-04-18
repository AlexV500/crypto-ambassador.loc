<?php

namespace App\Repositories\Menu\MenuItem\Interface;

interface MenuItemRepositoryInterface
{

    public function getNextOrPrevMenuItem($nextOrPrevRowId);

}
