<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
# use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DuncanController extends Controller
{
    public function number(Request $request, $id)
    {
        #$x = $request->query->get('id');
        $x = $id;
        return new Response(
            "<html><body>This is the number page. Hello. $x</body></html>"
        );
    }

    public function string($str)
    {
        return new Response(
            "<html><body>This is the string page. Hello. $str</body></html>"
        );
    }

    public function four_o_four()
    {
        throw $this->createNotFoundException('The product does not exist. four_o_four');
    }

    public function flash(SessionInterface $session)
    {
        $this->addFlash('notice', 'Flash! We only have forty five minutes to save the world!');
        $flashBag = $session->getFlashBag();
        $msg = $flashBag->get('notice')[0];
        return new Response(
            "<html><body>Flash $msg</body></html>"
        );
    }

    public function jjson()
    {
        return $this->json(array('username' => 'jane.doe'));
    }

}
