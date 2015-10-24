<?php
/**
 * Created by PhpStorm.
 * User: stephen
 * Date: 24/10/15
 * Time: 19:18
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class QuoteController
 *
 * @Route("/quotes")
 * @package AppBundle\Controller
 */
class QuoteController extends Controller
{
    /**
     * @Route("/", name="quote_index")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $quotes = $this->getDoctrine()->getRepository('AppBundle:Quote')
            ->findAll();

        return $this->render(':quote:index.html.twig', array(
            'quotes' => $quotes
        ));
    }
}
