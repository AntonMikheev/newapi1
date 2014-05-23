<?php

class UserControllerTest extends TestCase {

    public static $hash;

    public function testregistrationNewUser() {

        $my = new ReviewsController();
        $data = '{"name":"Tom2","email":"33","password":"33"}';
        $response = $this->call('POST', 'registration', [], [], ['Accept: application/json', 'Content-Type: application/json'], $data);
        $resp = $response->getContent();
        $resp_decode = json_decode($resp, true);
        $this->assertEquals($resp_decode['success'], true);
        $this->assertResponseStatus(200);
    }

    public function testuserLogin() {

        $my = new UserController();
        $data = '{"email":"1", "password":"1"}';
        $response = $this->call('POST', 'userlogin', [], [], ['Accept: application/json', 'Content-Type: application/json'], $data);
        $resp = $response->getContent();
        $resp_decode = json_decode($resp, true);
        $this->assertNotEmpty($resp_decode['name'], $resp_decode['islogin']);
        UserControllerTest::$hash = $resp_decode['islogin'];
        $this->assertResponseStatus(200);
    }

    public function testuserLogout() {

        $my = new ReviewsController();
        $islogin = UserControllerTest::$hash;
        $data = array('islogin'=>$islogin);
        $json_data = json_encode($data);
        $response = $this->call('GET', 'userlogout', [], [], ['Accept: application/json', 'Content-Type: application/json'], $json_data);
        $resp = $response->getContent();
        $resp_decode = json_decode($resp, true);
        $this->assertEquals($resp_decode['success'], true);
        $this->assertResponseStatus(200);
        UserControllerTest::$hash = NULL;
    }
//
    public function testisLogin() {

        $my = new ReviewsController();
        $islogin = UserControllerTest::$hash;
        $data = array('islogin'=>$islogin);
        $json_data = json_encode($data);
        $response = $this->call('GET', 'islogin', [], [], ['Accept: application/json', 'Content-Type: application/json'], $json_data);
        $resp = $response->getContent();
        $resp_decode = json_decode($resp, true);
        var_dump($resp_decode);
        $this->assertEquals($resp_decode['success'], false);
        $this->assertResponseStatus(200);
    }
}
