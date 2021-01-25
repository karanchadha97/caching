<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{
    /**
     * @Route("/sendmail/sendmail")
     */
    public function sendmail(MailerInterface $mailer)
    {
        $email = (new Email())
                    ->from('ajindal700@gmail.com')
                    ->to('aatif8015@gmail.com')
                    ->subject('Testing mailer')
                    ->text('My first mail which I sent through Symfony')
                    ->attachFromPath('Anshul Jindal.pdf');

        $mailer->send($email);
        return $this->json([
            'message' => 'Email Sent!'
        ]);
    }
}