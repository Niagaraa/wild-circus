<?php

namespace App\DataFixtures;

use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class EventFixtures extends Fixture implements DependentFixtureInterface
{
    const PICTURES = [
        'https://images.hdqwalls.com/wallpapers/zendaya-as-anne-wheeler-artwork-19.jpg',
        'https://www.itl.cat/pngfile/big/173-1736997_the-greatest-showman-zac-efron-zendaya-zac-efron.jpg',
        'https://www.tanikal.com/wp-content/uploads/2017/11/rebecca_ferguson_in_the_greatest_showman-wide.jpg',
        'https://images5.alphacoders.com/901/thumb-1920-901111.jpg',
        'https://images.pexels.com/photos/1364859/pexels-photo-1364859.jpeg?cs=srgb&dl=circus-artist-1364859.jpg&fm=jpg',
        'https://storage.needpix.com/rsynced_images/acrobats-412011_1280.jpg',
        'https://storage.needpix.com/rsynced_images/circus-828680_1280.jpg',
        'https://storage.needpix.com/rsynced_images/acrobats-1934561_1280.jpg',
        'https://upload.wikimedia.org/wikipedia/en/4/4e/Odysseo_Les_Voyageurs.jpg'
    ];

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $event = new Event();

            $event->setTitle($faker->text(30));
            $event->setDate($faker->dateTime);
            $event->setPicture(self::PICTURES[rand(0,8)]);
            $event->setDescription($faker->paragraph(10));
            $event->setCity($faker->city);
            $event->addMember($this->getReference('member_' . rand(0, 9)));

            $manager->persist($event);
        }

        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return [TroopFixtures::class];
    }
}
