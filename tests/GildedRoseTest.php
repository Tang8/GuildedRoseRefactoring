<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    /**
     * @var Item[]
     */
    private array $items;

    /**
     * @var GildedRose
     */
    private GildedRose $gildedRose;

    protected function setUp() : void
    {
        $this->items = [
            new Item('+5 Dexterity Vest', 10, 20),
            new Item('Aged Brie', 2, 0),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
            new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Conjured Mana Cake', 3, 6),
        ];

        $this->gildedRose = new GildedRose($this->items);
    }

    public function testInsertItemInIventory(): void
    {
        $this->assertSame($this->items, $this->gildedRose->getItems());
    }

    public function testupdateQualityDay1(): void
    {
        $this->gildedRose->updateQuality();
        $this->assertSame([
            (string) new Item('+5 Dexterity Vest', 9, 19),
            (string) new Item('Aged Brie', 1, 1),
            (string) new Item('Elixir of the Mongoose', 4, 6),
            (string) new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            (string) new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            (string) new Item('Backstage passes to a TAFKAL80ETC concert', 14, 21),
            (string) new Item('Backstage passes to a TAFKAL80ETC concert', 9, 50),
            (string) new Item('Backstage passes to a TAFKAL80ETC concert', 4, 50),
            (string) new Item('Conjured Mana Cake', 2, 5)
        ], $this->gildedRose->getItemsAsString());
    }

    public function testupdateQualityDay15(): void
    {
        for ($i = 0; $i < 15; $i++) {
            $this->gildedRose->updateQuality();
        }
        $this->assertSame([
            (string) new Item('+5 Dexterity Vest', -5, 0),
            (string) new Item('Aged Brie', -13, 28),
            (string) new Item('Elixir of the Mongoose', -10, 0),
            (string) new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            (string) new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            (string) new Item('Backstage passes to a TAFKAL80ETC concert', 0, 50),
            (string) new Item('Backstage passes to a TAFKAL80ETC concert', -5,0),
            (string) new Item('Backstage passes to a TAFKAL80ETC concert', -10, 0),
            (string) new Item('Conjured Mana Cake', -12, 0)
        ], $this->gildedRose->getItemsAsString());
    }

    public function testupdateQualityDay30(): void
    {
        for ($i = 0; $i < 30; $i++) {
            $this->gildedRose->updateQuality();
        }

        $this->assertSame([
            (string) new Item('+5 Dexterity Vest', -20, 0),
            (string) new Item('Aged Brie', -28, 50),
            (string) new Item('Elixir of the Mongoose', -25, 0),
            (string) new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            (string) new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            (string) new Item('Backstage passes to a TAFKAL80ETC concert', -15, 0),
            (string) new Item('Backstage passes to a TAFKAL80ETC concert', -20, 0),
            (string) new Item('Backstage passes to a TAFKAL80ETC concert', -25, 0),
            (string) new Item('Conjured Mana Cake', -27, 0)
        ], $this->gildedRose->getItemsAsString());
    }
}
