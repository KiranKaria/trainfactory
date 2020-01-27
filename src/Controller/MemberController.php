<?php

namespace App\Controller;

use DateTimeInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class MemberController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage()
    {
        return $this->render('Homepage/home.html.twig');
    }

    /**
     * @route("/training")
     */
    public function training()
    {
        return $this->render('training/training.html.twig');
    }


    /**
     * @route("/member")
     */
    public function member()
    {
        return $this->render('member/member.html.twig');
    }

    /**
     * @Route("/contact")
     */
    public function contact()
    {
        return $this->render('contact/contact.html.twig');
    }

    /**
     * @route("/adminHome")
     */
    public function adminHome()
    {
        return $this->render('adminHome/adminHome.html.twig');
    }

    /**
     * @route("/inloggen")
     */
    public function inloggen()
    {
        return $this->render('inloggen/inloggen.html.twig');

    }
}