<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\Fetcher;
use App\Services\Paginator;

class HomeController extends AbstractController
{
    /**
     * @Route("/{page}",name="app_home",defaults={"page"=0})
     */
    public function home(Fetcher $fetch, Paginator $paginator, $page){
        $result = $paginator->pagination(json_decode($fetch->getUsers()),$page*10,10);
        return $this->render('Home/index.html.twig',[
            'users' => $result,
            'counter' => $page
        ]);
    }
}