<?php

namespace App\DataFixtures;

use App\Entity\Troop;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class TroopFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10 ; $i++) {
            $troop = new Troop();

            $troop->setName($faker->name());
            $troop->setAlias($faker->title.$faker->lastName);
            $troop->setPicture($faker->imageUrl(500, 300, 'nightlife'));
            $troop->setSpeciality($faker->jobTitle);

            $manager->persist($troop);
        }

        $manager->flush();
    }
}
