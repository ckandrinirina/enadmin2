<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture implements OrderedFixtureInterface
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $em)
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setType($this->getReference('administrateur'));
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'enadmin123'
        ));
        $role_admin[] = 'ROLE_SUPER_ADMIN';
        $user->setRoles($role_admin);
        $user->setIsActive(true);
        $em->persist($user);

        // $user1 = new User();
        // $user1->setUsername('enseignant');
        // $user1->setType($this->getReference('enseignant'));
        // $user1->setPassword($this->passwordEncoder->encodePassword(
        //     $user1,
        //     'enadmin123'
        // ));
        // $role_enseignant[] = 'ROLE_ADMIN';
        // $user1->setRoles($role_enseignant);
        // $user1->setIsActive(true);
        // $em->persist($user1);

        // $user2 = new User();
        // $user2->setUsername('etudiant');
        // $user2->setType($this->getReference('etudiant'));
        // $user2->setPassword($this->passwordEncoder->encodePassword(
        //     $user2,
        //     'enadmin123'
        // ));
        // $role_etudiant[] = 'ROLE_USER';
        // $user2->setRoles($role_etudiant);
        // $user2->setEtudiant($this->getReference('etudiant1'));
        // $user2->setIsActive(true);
        // $em->persist($user2);

        $em->flush();
    }
    public function getOrder()
    {
        return 18;
    }
}
