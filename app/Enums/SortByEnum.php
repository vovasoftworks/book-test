<?php

namespace App\Enums;

enum SortByEnum: string
{
      const TITLE = 'title';
      const PRICE = 'price';
      const QUANTITY = 'quantity';

      const COLUMNS = [
          self::TITLE,
          self::PRICE,
          self::QUANTITY
      ];
}
