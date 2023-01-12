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
        $this->setTransport('default')->from('$najmi@abc.com')
            ->to($userdata['email'])
            ->subject(sprintf('Welcome %s', $userdata['name']))
            ->template('welcome') // By default template with same name as method name is used
            ->set('email', $email)
            ->set('name', $name)
            ->set('token', $token)
            ->set('token_expires', $tokenExpires)
            ->setEmailFormat('html');
          
    }

    public function resetPassword($user)
    {
        $this
            ->to($user->email)
            ->subject('Reset password')
            ->set(['token' => $user->token]);
    }
}
