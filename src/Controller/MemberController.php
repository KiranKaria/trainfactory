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

   // /**
    // * @route("/training")
  //   */
  //  public function training()
  //  {
  //      return $this->render('training/index.html.twig');
  //  }


    /**
     * @route("/register")
    */


    /**
     * @Route("/contact")
     */
    public function contact()
    {
        return $this->render('contact/contact.html.twig');

    }

    /**
     * @route("/adminHome", name="admin_home")
     */
    public function adminHome()
    {
        return $this->render('homepage/adminHome.html.twig');
    }

    /**
     * @route("/login")
     */
    public function login()
    {
        return $this->render('security/login.html.twig');

    }
    /**
     * @route("/lidhome")
     */
    public function lidhome()
    {
        return $this->render('homepage/lidhome.html.twig');
    }
}