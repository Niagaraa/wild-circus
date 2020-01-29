<?php

namespace App\DataFixtures;

use App\Entity\Event;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class EventFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10 ; $i++) {
            $event = new Event();

            $event->setTitle($faker->text(30));
            $event->setDate($faker->date('d/m/Y'));
            $event->setPicture($faker->imageUrl(500, 300, 'nightlife'));
            $event->setDescription($faker->paragraph);
            $event->setCity($faker->city);

            $manager->persist($event);
        }

        $manager->flush();
    }
}
