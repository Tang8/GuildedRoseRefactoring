<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use GildedRose\GildedRose;
use GildedRose\Item;

/*
 * Init Character
 *
 * @return GildedRose
 */
function initCharacter(): GildedRose
{
    return new GildedRose(initItems());
}

/*
 * Init Array of Items
 *
 * @return Item[]
 */
function initItems(): array
{
    return [
        new Item('+5 Dexterity Vest', 10, 20),
        new Item('Aged Brie', 2, 0),
        new Item('Elixir of the Mongoose', 5, 7),
        new Item('Sulfuras, Hand of Ragnaros', 0, 80),
        new Item('Sulfuras, Hand of Ragnaros', -1, 80),
        new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
        new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
        new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
        // this conjured item does not work properly yet
        new Item('Conjured Mana Cake', 3, 6),
    ];
}

/*
 * Print in Terminal function
 */
function printCommand(string $str): void
{
    echo $str . PHP_EOL;
}

/*
 * Start Adventure Function
 */
function start_adventure(int $days): void
{
    printCommand('OMGHAI');

    $character = initCharacter();

    for ($i = 0; $i < $days; $i++) {
        printCommand("\n-------- day ${i} --------");
        printCommand('name, sellIn, quality');
        foreach ($character->getItems() as $item) {
            printCommand((string) $item);
        }
        $character->updateQuality();
    }
}

/*
 * Start adventure call function
 */
start_adventure($argv > 1 ? (int) $argv[1] : 2);
