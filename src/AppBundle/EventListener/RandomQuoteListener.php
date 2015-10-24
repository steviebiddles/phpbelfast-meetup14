<?php

namespace AppBundle\EventListener;

use AppBundle\Repository\QuoteRepository;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/**
 * Class RandomQuoteListener
 * @package AppBundle\EventListener
 */
class RandomQuoteListener
{

    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @var QuoteRepository
     */
    private $quoteRepository;

    /**
     * @param \Twig_Environment $twig
     * @param QuoteRepository $quoteRepository
     */
    public function __construct(\Twig_Environment $twig, QuoteRepository $quoteRepository)
    {
        $this->twig = $twig;
        $this->quoteRepository = $quoteRepository;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        if (!$event->isMasterRequest()) {
            return;
        }

        if (!in_array('random_quote_event', $this->twig->getGlobals())) {
            $this->twig->addGlobal('random_quote_event', $this->quoteRepository->findRandom());
        }
    }
}
