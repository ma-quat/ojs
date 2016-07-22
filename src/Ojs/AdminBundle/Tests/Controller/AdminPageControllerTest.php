<?php

namespace Ojs\AdminBundle\Tests\Controller;

use Ojs\AdminBundle\Entity\AdminPage;
use Ojs\CoreBundle\Tests\BaseTestSetup as BaseTestCase;

class AdminPageControllerTest extends BaseTestCase
{
    public function testIndex()
    {
        $this->logIn();
        $client = $this->client;
        $client->request('GET', '/admin/page/');

        $this->assertStatusCode(200, $client);
    }

    public function testNew()
    {
        $this->logIn();
        $client = $this->client;
        $crawler = $client->request('GET', '/admin/page/new');

        $this->assertStatusCode(200, $client);

        $form = $crawler->filter('form[name=admin_page]')->form();
        $form['admin_page[translations]['.$this->locale.'][title]'] = 'Page Title - phpunit';
        $form['admin_page[translations]['.$this->locale.'][body]'] = 'body - phpunit';
        $form['admin_page[visible]'] = '1';
        $client->submit($form);

        $this->assertTrue($client->getResponse()->isRedirect());
        $client->followRedirect();

        $this->assertContains(
            'Page Title - phpunit',
            $client->getResponse()->getContent()
        );
    }

    public function testShow()
    {
        $this->logIn();
        $client = $this->client;
        $client->request('GET', '/admin/page/1/show');

        $this->assertStatusCode(200, $client);
    }

    public function testEdit()
    {
        $this->logIn();
        $client = $this->client;
        $crawler = $client->request('GET', '/admin/page/1/edit');

        $this->assertStatusCode(200, $client);

        $form = $crawler->filter('form[name=admin_page]')->form();
        $form['admin_page[translations]['.$this->locale.'][title]'] = 'Page Edit Title - phpunit';
        $form['admin_page[translations]['.$this->locale.'][body]'] = 'body - phpunit';
        $form['admin_page[visible]'] = '1';
        $client->submit($form);

        $this->assertTrue($client->getResponse()->isRedirect());
        $client->followRedirect();

        $this->assertContains(
            'Page Edit Title - phpunit',
            $client->getResponse()->getContent()
        );


    }

    public function  testDelete()
    {
        $em = $this->em;

        $entity = new AdminPage();
        $entity->setCurrentLocale($this->locale);
        $entity->setTitle('Title Delete - phpunit');
        $entity->setBody('Body');
        $entity->setVisible(true);

        $em->persist($entity);
        $em->flush();

        $id = $entity->getId();

        $this->logIn();
        $client = $this->client;
        $token = $this->generateToken('ojs_admin_page'.$id);
        $client->request('DELETE', '/admin/page/'.$id.'/delete', array('_token' => $token));

        $this->assertStatusCode(302, $client);
    }
}