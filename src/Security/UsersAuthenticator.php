<?php

namespace App\Security;

use App\Entity\Users;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Doctrine\ORM\EntityManagerInterface;


class UsersAuthenticator extends AbstractLoginFormAuthenticator
{
    private $entityManager;

    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    private UrlGeneratorInterface $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator,EntityManagerInterface $entityManager)
    {
        $this->urlGenerator = $urlGenerator;
        $this->entityManager = $entityManager;
    }

    public function authenticate(Request $request): Passport
    {
        $email = $request->request->get('email', '');

        $request->getSession()->set(Security::LAST_USERNAME, $email);
       /* $userRepository = $this->entityManager->getRepository(Users::class);
        $user = $userRepository->findOneBy(['email' => $email]);
        $sess=$request->getSession();
        $sess->set('user_id', $user->getId());
        $sess->set('user_name', $user->getFirstName());
        $sess->set('user_email', $email);*/
        //$sess->set('contributor', $user->getContributor());
        //$sess->set('user', $user);
        return new Passport(
            new UserBadge($email),
            new PasswordCredentials($request->request->get('password', '')),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }
       
        $email = $request->request->get('email', '');
        $userRepository = $this->entityManager->getRepository(Users::class);
        $user = $userRepository->findOneBy(['email' => $email]);
        $sess=$request->getSession();
        $sess->set('user_id', $user->getId());
        $sess->set('user_name', $user->getFirstName());
        $sess->set('user_email', $email);
        // For example:
        return new RedirectResponse($this->urlGenerator->generate('main'));
        // throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
