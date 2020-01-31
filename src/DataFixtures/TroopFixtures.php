<?php

namespace App\DataFixtures;

use App\Entity\Event;
use App\Entity\Troop;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class TroopFixtures extends Fixture
{
    const PICTURES = [
        'https://britishcinematographer.co.uk/wp-content/uploads/2018/02/DF-25877_r.jpg',
        'https://i.pinimg.com/originals/7e/6f/34/7e6f3495a16894b7f97947336137c34e.jpg',
        'https://i0.wp.com/movienetworkpr.com/wp-content/uploads/2017/12/showman_web8.jpg?resize=1200%2C630',
        'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Phoebe_Tonkin_at_PaleyFest_2014.jpg/400px-Phoebe_Tonkin_at_PaleyFest_2014.jpg',
        'https://upload.wikimedia.org/wikipedia/commons/thumb/7/75/Joseph_Morgan_at_PaleyFest_2014.jpg/400px-Joseph_Morgan_at_PaleyFest_2014.jpg',
        'https://upload.wikimedia.org/wikipedia/commons/f/f7/Katie_Cassidy_August_2016.jpg',
        'https://i.pinimg.com/originals/fc/70/3f/fc703fba154949526c9f77e5d6968900.jpg',
        'https://static.hitek.fr/img/actualite/ill_m/1798501767/wolvy.jpg',
        'https://cdn.pixabay.com/photo/2016/02/24/08/31/girl-1219339_960_720.jpg',
        'https://cdn.pixabay.com/photo/2019/11/06/10/44/fire-4605815_960_720.jpg',
        'https://cdn.pixabay.com/photo/2016/12/29/15/24/acrobat-1938713_960_720.jpg',
        'https://cdn.pixabay.com/photo/2020/01/07/06/52/fashion-4746903_960_720.jpg',
        'https://cdn.pixabay.com/photo/2018/02/11/21/39/weightlifter-3146825_960_720.jpg'
    ];

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 20; $i++) {
            $troop = new Troop();

            $troop->setName($faker->name());
            $troop->setAlias($faker->title . $faker->lastName);
            $troop->setPicture(self::PICTURES[rand(0,12)]);
            $troop->setSpeciality($faker->jobTitle);
            $this->addReference('member_' . $i, $troop);

            $manager->persist($troop);
        }

        $manager->flush();
    }
}
