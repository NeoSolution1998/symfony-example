<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Model\User;

class UserController extends AbstractController
{
    /**
     * @Route("/users", methods={"get"}) 
     */
    public function index(Request $request): Response
    {
        $users = new User();
        $users = $users->getAll();
        return $this->render('main/index.html.twig', [
            'users' => $users,
        ]);
    }
    
    /**
     * @Route("/", methods={"get"}) 
     */
    public function create(): Response
    {
        return $this->render('main/create.html.twig');
    }

    /**
     * @Route("/users", methods={"post"}) 
     */
    public function store(Request $request): Response
    {
       
        $user = new User();
        
        $user->name($request->get('name'));
        $user->email($request->get('email'));
        $user->password($request->get('password'));
        $user->save();
        
        return $this->redirect('/users');
    }

}
