<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private UserPasswordEncoderInterface $passwordEncoder;

    /**
     * AppFixtures constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 1; $i <= 2; $i++) {
            $user = new User();
            $user->setNom($faker->unique(true)->lastName)
                ->setPrenom($faker->unique(true)->firstName)
                ->setEmail($faker->unique(true)->email)
                ->setPassword($this->passwordEncoder->encodePassword($user, 'user'));

            $manager->persist($user);
        }

        $admin = new User();
        $admin->setNom('zadi')
            ->setPrenom('joachim')
            ->setEmail('kim@mailsac.com')
            ->setPassword($this->passwordEncoder->encodePassword($admin, 'admin'))
            ->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);
        $manager->flush();
    }
}
