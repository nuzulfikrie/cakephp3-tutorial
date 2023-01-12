<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * Usersmailer mailer.
 */
class UsersmailerMailer extends Mailer
{
    /**
     * Mailer's name.
     *
     * @var string
     */
    public static $name = 'Usersmailer';

    public function welcome(array $userdata)
    {
        $token = $userdata['token'];
        $email = $userdata['email'];
        $name = $userdata['name'];
        $tokenExpires = $userdata['expires'];
        $this->setTransport('default')->setFrom('$najmi@abc.com')
            ->setTo($userdata['email'])
            ->setSubject(sprintf('Welcome %s', $userdata['name']))
            ->set('email', $email)
            ->set('name', $name)
            ->set('token', $token)
            ->set('token_expires', $tokenExpires)
            ->setEmailFormat('html');
        $this->viewBuilder()->setTemplate('welcome');

    }

    public function resetPassword($user)
    {
        $this
            ->to($user->email)
            ->subject('Reset password')
            ->set(['token' => $user->token]);
    }
}
